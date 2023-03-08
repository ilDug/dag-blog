import Fuse from 'fuse.js';
import * as React from 'react';
import { useState, useEffect } from 'react';
import { Article } from '../classes/article';
import SearchPost from './search-list-item.component';

type Props = {
    query: string
}

const SearchList: React.FC<Props> = ({ query }) => {
    const [archive, setArchive] = useState<Article[]>([]);
    const [results, setResults] = useState<Article[]>([]);

    const fuseOpts = {
        keys: [
            { name: "tags", weight: 0.3 },
            { name: "metadata.title", weight: 1 },
            { name: "summary", weight: 0.5 },
        ]
    }

    /** carica la lista degli articoli dall'api. */
    useEffect(() => {
        const loadArticles = async () => {
            console.log(query, "questa è l'effect della Search List");

            const res = await fetch('/api/v1/blog/posts');
            const articles: Article[] = await res
            .json()
                .then((list: any[]) => list.map(a => new Article(a)));
            setArchive(articles);
            setResults(articles);
        }
        loadArticles();
    }, [])


    /** filtra i risultati con FuseJs */
    useEffect(() => {
        // console.log(query, "effectHook nella SearchList");
        const fuse = new Fuse(archive, fuseOpts)
        const res = !query ? archive : fuse.search(query).map(a => a.item);
        setResults(res);
    }, [query])



    return (
        <React.Fragment>
            <p>{query}</p>
            <div>
                {/* {results.map(a => <li key={a.metadata.code.toString()}>{a.metadata.title}</li>)} */}
                {results.map(a => <SearchPost article={a} />)}
            </div>
        </React.Fragment>
    );
};

export default SearchList;