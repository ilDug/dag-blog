import Fuse from 'fuse.js';
import * as React from 'react';
import { useState, useEffect, useContext, FC } from 'react';
import { Article } from '../classes/article';
import SearchPost from './search-list-item.component';
import { ConfigsCtx } from '../index';

type Props = {
    query: string
}

const SearchList: React.FC<Props> = ({ query }) => {
    const [archive, setArchive] = useState<Article[]>([]);
    const [results, setResults] = useState<Article[]>([]);
    const { postsApiEndpoint } = useContext(ConfigsCtx)

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
            const res = await fetch(postsApiEndpoint);
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
        console.log(query, "effectHook nella SearchList");
        const fuse = new Fuse(archive, fuseOpts)
        const res = !query ? archive : fuse.search(query).map(a => a.item);
        setResults(res);
    }, [query])



    return (
        <React.Fragment>
            <div>
                {results.map(a => <SearchPost article={a} key={("" + a.metadata.code)} />)}
            </div>
        </React.Fragment>
    );
};

export default SearchList;