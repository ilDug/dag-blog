// import "../styles/styles.scss"
// import { Dcc } from './plugins/cookie-consent'
// import { Tooltip, Offcanvas } from 'bootstrap';


import { DagTyperSetup } from "./typer";

import React, { Context, createContext } from "react";
import { createRoot, Root } from "react-dom/client";

/** HIGHLIGHT ******************************************** */
// import hljs from "highlight.js";
import hljs from 'highlight.js/lib/core';
// import 'highlight.js/scss/github-dark-dimmed.scss';

import bash from 'highlight.js/lib/languages/bash';
hljs.registerLanguage('bash', bash);
import dockerfile from 'highlight.js/lib/languages/dockerfile';
hljs.registerLanguage('dockerfile', dockerfile);
import http from 'highlight.js/lib/languages/http';
hljs.registerLanguage('http', http);
import ini from 'highlight.js/lib/languages/ini';
hljs.registerLanguage('ini', ini);
import javascript from 'highlight.js/lib/languages/javascript';
hljs.registerLanguage('javascript', javascript);
import markdown from 'highlight.js/lib/languages/markdown';
hljs.registerLanguage('markdown', markdown);
import php from 'highlight.js/lib/languages/php';
hljs.registerLanguage('php', php);
import python from 'highlight.js/lib/languages/python';
hljs.registerLanguage('python', python);
import scss from 'highlight.js/lib/languages/scss';
hljs.registerLanguage('scss', scss);
import typescript from 'highlight.js/lib/languages/typescript';
hljs.registerLanguage('typescript', typescript);
import xml from 'highlight.js/lib/languages/xml';
hljs.registerLanguage('xml', xml);
/********************************************** */



import SearchApp from "./components/search-app";
import ArticleLoveBtn from "./components/article-love-btn";
import CopyLinkBtn from "./components/article-copy-link-btn";

export const ConfigsCtx: Context<any> = createContext({
    postsApiEndpoint: "/blog/api/v1/blog/posts"
})




window.onload = async () => {
    console.log(window.location.href)

    /**
     * COOKIE CONSENT
     */
    // let dcc = new Dcc({
    //     /** override default configs*/
    //     policyVersion: new Date("2023-02-08"),
    //     cookiePolicyLink: "/blog/privacy/cookies",
    //     diplayRejectAllBtn: false
    // });

    /**
     * attiva tutti i TOOLTIP
     */
    // document
    //     .querySelectorAll("[data-toggle=tooltip]")
    //     .forEach((el) => new Tooltip(el));

    /**
     * applica hyghlight.js
     */
    document
        .querySelectorAll(".article pre code")
        .forEach((el: HTMLElement) => hljs.highlightElement(el))

    /**
     * Attiva Bootstrap Offcanvas
     */
    // document
    //     .querySelectorAll('.offcanvas')
    //     .forEach(el => new Offcanvas(el));

    /**
     * Attiva il typer nella navbar
     */
    DagTyperSetup()

    /**
     * traforma il contenuto dello span del file markdown nel titolo 
     * della finestra PRE 
     */
    document
        .querySelectorAll(".article pre + p span[title]")
        .forEach(el => {
            const pre = el.parentElement.previousElementSibling
            const title = el.getAttribute("title")
            const icon = el.getAttribute("icon")
            const fa = el.getAttribute("fa")
            const preTitle = document.createElement("span");
            let content = fa && icon ? `<i class="fa-${fa} fa-${icon}"></i>` : '';
            content = `${content} ${title}`;
            preTitle.innerHTML = content;
            preTitle.classList.add('title');
            pre.appendChild(preTitle);
        })


    /** 
     * crea il btn per copiare il contenuto di un PRE
     */
    document
        .querySelectorAll(".article pre code")
        .forEach(block => {
            const copyBtn = document.createElement("i");
            copyBtn.classList.add("fa-regular");
            copyBtn.classList.add("fa-clipboard");

            const spanCopyBtn = document.createElement("span");
            spanCopyBtn.classList.add("copy-btn");

            spanCopyBtn.addEventListener("click", async ev => {
                const code = block as HTMLElement;
                const text = code.innerText;
                await navigator.clipboard.writeText(text);
                copyBtn.classList.remove("fa-clipboard");
                copyBtn.classList.add("fa-check");
                spanCopyBtn.classList.add("copied");

                setTimeout(() => {
                    copyBtn.classList.remove("fa-check");
                    copyBtn.classList.add("fa-clipboard");
                    spanCopyBtn.classList.remove("copied");
                }, 2000);
            });

            spanCopyBtn.appendChild(copyBtn);
            block.parentElement.appendChild(spanCopyBtn);
        })


    /**
     * ARTICLE COPY LINK BTN
     */
    const copyLink: HTMLElement = document.querySelector("#post #sidebar #side-copy-link-btn")
    if (copyLink) {
        const linkCtn: Root = createRoot(copyLink!);
        linkCtn.render(<CopyLinkBtn />);
    }

    /**
     * ARTICLe LIKE BTN
     */
    const loveBtn: HTMLElement = document.querySelector("#post #sidebar #side-love-btn")
    if (loveBtn) {
        const loveCtn: Root = createRoot(loveBtn!);
        loveCtn.render(<ArticleLoveBtn />);
    }

    /**
     * SEARCH PAGE 
     */
    const searchApp = document.getElementById('search-app');
    if (searchApp) {
        console.log("Pagina Ricerca Avviata");
        // const resultList: HTMLDivElement = document.getElementById('results-list');
        // const searchInput: HTMLInputElement = document.getElementById('search-input');
        // const initialValue = searchApp.getAttribute('data-search');

        const searchParams = new URLSearchParams(document.location.search)
        const q = searchParams.get('q');

        /** creazione del container */
        const root: Root = createRoot(searchApp!);
        root.render(
            // <ConfigsCtx.Provider >
            <SearchApp searchValue={q} />
            // </ConfigsCtx.Provider>
        );
    }


}