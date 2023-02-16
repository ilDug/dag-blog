import "../styles/styles.scss"
import { Dcc } from './plugins/cookie-consent'
import { Tooltip } from 'bootstrap';
import hljs from "highlight.js";
import 'highlight.js/scss/github-dark-dimmed.scss';

declare const ENV: { CONTACTS_ENDPOINT: string, POSTS_ENPOINT: string };

window.onload = async () => {
    console.log(window.location.href)

    /**
     * COOKIE CONSENT
     */
    // let dcc = new Dcc({
    //     /** override default configs*/
    //     policyVersion: new Date("2023-02-08"),
    //     cookiePolicyLink: "/privacy/cookies",
    //     diplayRejectAllBtn: false
    // });

    // document
    //     .querySelectorAll(".article img")
    //     .forEach(img => {
    //         img.classList.add('img-fluid')
    //     })

    /**
 * attiva tutti i TOOLTIP
 */
    document
        .querySelectorAll("[data-toggle=tooltip]")
        .forEach((el) => new Tooltip(el));

    document
        .querySelectorAll(".article pre code")
        .forEach((el: HTMLElement) => hljs.highlightElement(el))

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


    const copyToClipboard = async (code: HTMLElement, btn: HTMLElement) => {

    }

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


}