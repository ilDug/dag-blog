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

    /**
 * attiva tutti i TOOLTIP
 */
    document
        .querySelectorAll("[data-toggle=tooltip]")
        .forEach((el) => new Tooltip(el));

    document
        .querySelectorAll(".article pre code")
        .forEach((el: HTMLElement) => hljs.highlightElement(el))

}