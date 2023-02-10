import { Component, OnInit } from '@angular/core';
import { EmailValidator, FormControl, FormGroup, Validators } from '@angular/forms';
import { Router } from '@angular/router';

@Component({
    selector: 'app-login',
    templateUrl: './login.component.html',
    styleUrls: ['./login.component.scss']
})
export class LoginComponent implements OnInit {
    constructor(
        private router: Router
    ) { }

    public form: FormGroup;
    public error: string;

    ngOnInit(): void {
        const controls = {
            email: new FormControl(null, [Validators.required, Validators.email]),
            password: new FormControl(null, [Validators.required])
        }

        this.form = new FormGroup(controls)
    }

    login() {
        if (this.form.invalid) return;

        this.form.controls.email.markAsPending()

        const { email, password } = this.form.value;


    }

}
