import "../styles/styles.scss"
import { Dcc } from './plugins/cookie-consent'
import { Tooltip, Offcanvas } from 'bootstrap';
import hljs from "highlight.js";
import 'highlight.js/scss/github-dark-dimmed.scss';
import { DagTyperSetup } from "./typer";

import React, { Context } from "react";
import { createRoot, Root } from "react-dom/client";

import SearchApp from "./components/search-app";

declare const ENV: { CONTACTS_ENDPOINT: string, POSTS_ENPOINT: string };

window.onload = async () => {
    console.log(window.location.href)

    /**
     * COOKIE CONSENT
     */
    let dcc = new Dcc({
        /** override default configs*/
        policyVersion: new Date("2023-02-08"),
        cookiePolicyLink: "/privacy/cookies",
        diplayRejectAllBtn: false
    });

    /**
     * attiva tutti i TOOLTIP
     */
    document
        .querySelectorAll("[data-toggle=tooltip]")
        .forEach((el) => new Tooltip(el));

    /**
     * applica hyghlight.js
     */
    document
        .querySelectorAll(".article pre code")
        .forEach((el: HTMLElement) => hljs.highlightElement(el))

    /**
     * Attiva Bootstrap Offcanvas
     */
    document
        .querySelectorAll('.offcanvas')
        .forEach(el => new Offcanvas(el));

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
     * Annunci ADSESNE
     */
    // if (dcc.isConsentGiven('targeting')) {
    console.log(dcc.isConsentGiven('targeting'));

    document
        .querySelectorAll(".article span[data-ads]")
        .forEach(ads => {
            ads.innerHTML = `
                    <script type="text/javascript"  async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-3060490671697073" crossorigin="anonymous"></script>
                    <ins class="adsbygoogle" style="display:block; text-align:center;" data-ad-layout="in-article" data-ad-format="fluid" data-ad-client="ca-pub-3060490671697073" data-ad-slot="1410244111"></ins>
                    <script type="text/javascript" >
                        (adsbygoogle = window.adsbygoogle || []).push({});
                    </script>
                `;
        });

    // }




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
        root.render(<SearchApp searchValue={q} />);


    }


}