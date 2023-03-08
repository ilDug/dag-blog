import * as React from 'react';
import { useState, useEffect } from 'react';

type Props = {
    id: number,
    article: Article,
}

const SearchPost: React.FC<Props> = ({ id, article }) => {
    return (
        <React.Fragment>

            <div cassName="card mb-3">
                <div cassName="row g-0">
                    <div cassName="col-md-4">
                        <div cassName="card-img-container">
                            <img src="{article.image.src}" cassName="" alt="%IMGALT%">
                        </div>
                    </div>
                    <div cassName="col-md-8">
                        <div cassName="card-body">
                            <h5 cassName="card-title"><a href="%LINK%">{article.metadata.title}</a></h5>
                            <p cassName="card-text">%SUMMARY%</p>
                            <p cassName="card-text">
                                <small cassName="text-muted">
                                  <em cassName="me-3"><i cassName="fa-light fa-calendar ms-2 me-1"></i> %DATE%</em>
                                  <strong cassName="me-3"><i cassName="fa-brands fa-github ms-2 me-1"></i> %AUTHOR%</strong>
                                </small>
                                <br>
                                <small class="text-muted">
                                    %TAGS%
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
