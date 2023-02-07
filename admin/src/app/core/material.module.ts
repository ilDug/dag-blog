import { NgModule } from '@angular/core';
import { MatButtonModule } from '@angular/material/button';
import { MatToolbarModule } from '@angular/material/toolbar';
import { MatMenuModule } from '@angular/material/menu'
import { MatFormFieldModule } from '@angular/material/form-field'
import { MatInputModule } from '@angular/material/input'

@NgModule({
    declarations: [],
    imports: [

    ],
    exports: [
        MatButtonModule,
        MatMenuModule,
        MatToolbarModule,
        MatFormFieldModule,
        MatInputModule,
    ]
})
export class MaterialModule { }
