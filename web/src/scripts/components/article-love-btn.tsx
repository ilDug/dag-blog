import * as React from 'react';
import { useState, useEffect } from 'react';
import Cookies from 'js-cookie';

// type Props = {}

const ArticleLoveBtn: React.FC = () => {
    const [active, setActive] = useState('');
    const [caption, setCaption] = useState('');

    const loveClass = (x) => {
        const value = (x == 1) ? 'active' : '';
        setActive(value);
    }

    useEffect(() => {
        const x = +Cookies.get('dag-love');
        loveClass(x)
    }, [])

    const love = (e) => {
        e.preventDefault();
        const path = document.location.pathname;
        const x = +Cookies.get('dag-love');
        if (x == 1) {
            Cookies.remove('dag-love', { path: path });
            loveClass(0);
        } else {
            Cookies.set('dag-love', '1', { path: path });
            loveClass(1);
            setCaption('love!');
            setTimeout(() => {
                setCaption('');
            }, 3000);
        }
    }

    return (
        <React.Fragment>
            <a href="" className={`side-item ${active}`} onClick={love}>
                <i className={`fa fa-heart ${active ? 'fa-solid' : 'fa-light'}`}></i>
                <span className="side-item-text">{caption}</span>
            </a>
        </React.Fragment>
    );
};

export default ArticleLoveBtn;