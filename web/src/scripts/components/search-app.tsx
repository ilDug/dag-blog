import * as React from 'react';
import { useState, useEffect } from 'react';
import SearchList from './search-list.component';

type Props = { searchValue: string }

const SearchApp: React.FC<Props> = ({ searchValue }) => {
    const [query, setQuery] = useState(searchValue)


    const handleQueryChange = (event) => {
        let q = event.target.value;
        console.log(q);
        setQuery(q);
    }

    return (
        <React.Fragment>
            <h1>Ricerca Articoli</h1>

            <div className="input-group mb-3">
                <i className="input-group-text fa-light fa-magnifying-glass" id="search-icon"></i>

                <input type="text" id="search-input" className="form-control" placeholder="..." aria-label="Username" aria-describedby="search-icon" onChange={handleQueryChange} value={query} />
            </div>

            <div className="row">
                <div className="col-12">
                    <SearchList query={query} />
                </div>
            </div>

        </React.Fragment>
    );
};

export default SearchApp;