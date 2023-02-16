export class DagTyper {

    constructor(public element: HTMLElement) {
        var delim = element.dataset.delim || ",";
        var words = element.dataset.words || "override these,sample typing";
        this.words = words.split(delim).filter((v) => v); // non empty words
        this.delayVariance = parseInt(element.dataset.delayVariance) || 0;
        this.delay = parseInt(element.dataset.delay) || 200;
        this.loop = element.dataset.loop || "true";
        if (this.loop === "false") { this.loop = 1 }
        this.deleteDelay = element.dataset.deletedelay || 800;
        this.progress = { word: 0, char: 0, building: true, looped: 0 };

        let colors = element.dataset.colors || "black";
        this.colors = colors.split(",");

        element.style.color = this.colors[0];

        this.doTyping();
    }

    public words;
    public delayVariance;
    public delay;
    public loop;
    public deleteDelay;
    public progress;
    public typing: boolean = true;
    public colors
    public colorIndex = 0;
    public cursor: DagCursor;


    public doTyping() {
        let e = this.element;
        let p = this.progress;
        let w = p.word;
        let c = p.char;
        let currentDisplay = [...this.words[w]].slice(0, c).join("");
        let atWordEnd;
        let timeoutDelay = ((2 * Math.random() - 1) * this.delayVariance) + this.delay;
        if (this.cursor) {
            this.cursor.element.style.opacity = "1";
            this.cursor.on = true;
            clearInterval(this.cursor.interval);
            this.cursor.interval = setInterval(() => this.cursor.updateBlinkState(), 400);
        }

        e.innerHTML = currentDisplay;

        if (p.building) {
            atWordEnd = p.char === this.words[w].length;
            if (atWordEnd) {
                p.building = false;
            } else {
                p.char += 1;
            }
        } else {
            if (p.char === 0) {
                p.building = true;
                p.word = (p.word + 1) % this.words.length;
                this.colorIndex = (this.colorIndex + 1) % this.colors.length;
                this.element.style.color = this.colors[this.colorIndex];
            } else {
                p.char -= 1;
            }
        }

        if (p.word === this.words.length - 1) {
            p.looped += 1;
        }

        if (!p.building && this.loop <= p.looped) {
            this.typing = false;
        }

        setTimeout(() => {
            if (this.typing) { this.doTyping() };
        }, atWordEnd ? this.deleteDelay : timeoutDelay);
    }

    public start() {
        if (!this.typing) {
            this.typing = true;
            this.doTyping();
        }
    }

    public stop() {
        this.typing = false;
    }
}


export class DagCursor {
    constructor(public element: HTMLElement) {
        this.cursorDisplay = element.dataset.cursordisplay || element.dataset.cursorDisplay || "_";
        element.innerHTML = this.cursorDisplay;
        element.style.transition = "all 0.1s";
        this.interval = setInterval(() => this.updateBlinkState(), 400);
    }
    public cursorDisplay;
    public on: boolean = true;
    public interval;
    public owner: DagTyper;

    public updateBlinkState() {
        if (this.on) {
            this.element.style.opacity = "0";
            this.on = false;
        } else {
            this.element.style.opacity = "1";
            this.on = true;
        }
    }

}


export function DagTyperSetup() {
    let typers: { [key: string]: DagTyper } = {};

    for (let e of document.getElementsByClassName("dag-typer")) {
        typers[e.id] = new DagTyper(e as HTMLElement);
    }

    let stops = [...document.getElementsByClassName("typer-stop")] as HTMLElement[]
    for (let e of stops) {
        e = e as HTMLElement;
        let owner: DagTyper = typers[e.dataset.owner];
        e.onclick = () => owner.stop();
    }

    let starts = [...document.getElementsByClassName("typer-start")] as HTMLElement[]
    for (let e of starts) {
        let owner: DagTyper = typers[e.dataset.owner];
        e.onclick = () => owner.start();
    }

    let cursors = [...document.getElementsByClassName("dag-cursor")] as HTMLElement[]
    for (let e of cursors) {
        let c = new DagCursor(e);
        c.owner = typers[e.dataset.owner];
        c.owner.cursor = c;
    }
}

// TyperSetup();



// <p>
//     It was
 //       <span class="typer" id="some-id" data-words="dark.,stormy.,night." data-delay="100" data-colors="#08605F,#177E89,purple"></span>
//
//     <span style="font-size:1.2em;vertical-align:middle;" class="cursor" data-cursorDisplay="|" data-owner="some-id"></span>
// </p>
// <button class="typer-stop" data-owner="some-id">Stop</button>
// <button class="typer-start" data-owner="some-id">Start</button>