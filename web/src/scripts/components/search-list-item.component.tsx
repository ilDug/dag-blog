import * as React from 'react';
import { useState, useEffect } from 'react';
import { Article } from '../classes/article';

type Props = {
    article: Article,
}

const SearchPost: React.FC<Props> = ({ article }) => {
    return (
        <React.Fragment>

            <div className="card mb-3">
                <div className="row g-0">
                    <div className="col-md-4">
                        <div className="card-img-container">
                            <figure className="figure"><img src={article.image.src} alt={article.image.alt} className="" /></figure>
                        </div>
                    </div>
                    <div className="col-md-8">
                        <div className="card-body">
                            <h5 className="card-title"><a href={article.metadata.url}>{article.metadata.title}</a></h5>
                            <p className="card-text">{article.summary}</p>
                            <p className="card-text">
                                <small className="text-muted">
                                    <em className="me-3"><i className="fa-light fa-calendar ms-2 me-1"></i> {article.metadata.update.toString()}</em>
                                    <strong className="me-3"><i className="fa-brands fa-github ms-2 me-1"></i> {article.metadata.author}</strong>
                                </small>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </React.Fragment>
    );
};

export default SearchPost;
