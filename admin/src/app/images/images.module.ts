import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { ImagesComponent } from './images/images.component';
import { ImagesListComponent } from './images-list/images-list.component';



@NgModule({
  declarations: [
    ImagesComponent,
    ImagesListComponent
  ],
  imports: [
    CommonModule
  ]
})
export class ImagesModule { }
