import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { SidenavComponent } from './sidenav/sidenav.component';
import { CoreModule } from '../core/core.module';



@NgModule({
  declarations: [
    SidenavComponent
  ],
  imports: [
    CommonModule,
    CoreModule,
  ],
  exports: [
    SidenavComponent,
  ]
})
export class SharedModule { }
