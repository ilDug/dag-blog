import * as React from 'react';
import { useState, useEffect } from 'react';

// type Props = {}

const CopyLinkBtn: React.FC = () => {

    const [classIcon, setClassIcon] = useState("fa-share-from-square");
    const [caption, setCaption] = useState("")

    const copyLink = async (e) => {
        e.preventDefault();
        const link = document.location.href;
        await navigator.clipboard.writeText(link);

        setClassIcon("fa-check");
        setCaption("copied!");
        setTimeout(() => {
            setClassIcon("fa-share-from-square");
            setCaption("");
        }, 3000);
    }

    return (
        <React.Fragment>
            <a href="" className="side-item side-copy-btn" onClick={copyLink}>
                <i className={`fa fa-light ${classIcon}`}></i>
                <span className="side-item-text" >{caption}</span>
            </a>
        </React.Fragment>
    );
};

export default CopyLinkBtn;