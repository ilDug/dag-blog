import * as React from 'react';
import { useState, useEffect } from 'react';
import { Article } from '../classes/article';

type Props = {
    query: string
}

const SearchList: React.FC<Props> = ({ query }) => {
    const [archive, setArchive] = useState<Article[]>([]);

    /** carica la lista degli articoli dall'api. */
    useEffect(() => {
        const loadArticles = async () => {
            console.log(query, "questa è l'effect della Search List");

            const res = await fetch('/api/v1/blog/posts');
            const articles: Article[] = await res
            .json()
                .then((list: any[]) => list.map(a => new Article(a)));
            setArchive(articles);
        }
        loadArticles()
    }, [])

    return (
        <React.Fragment>
            <p>{query}</p>
            <pre>
                {JSON.stringify(archive)}
            </pre>
        </React.Fragment>
    );
};

export default SearchList;