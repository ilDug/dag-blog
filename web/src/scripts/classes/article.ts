

export class Article {
    constructor(a: Partial<Article>) {
        a.metadata = new ArticleMetadata(a.metadata)
        Object.assign(this, a);
    }

    filepath: string;
    metadata: ArticleMetadata;
    image: ArticleImage;
    summary: string;
    tags: string[];
}


export class ArticleMetadata {
    constructor(m: Partial<ArticleMetadata>) {
        m.date = new Date(m.date) ?? null;
        m.update = new Date(m.update) ?? null;
        Object.assign(this, m);
    }

    title: string;
    code: number;
    publish: boolean;
    date: Date;
    update: Date;
    url: string;
    author: string;
    tags: string[];

}

export type ArticleImage = {
    markdown: string;
    alt: string;
    src: string;
    html: string;
};

