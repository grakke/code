import { NgModule } from '@angular/core';
import { FormsModule } from '@angular/forms';
import { BrowserModule } from '@angular/platform-browser';
import { AboutComponent } from './about/about.component';
import { AdminImageCreateComponent } from './admin/admin-image-create/admin-image-create.component';
import { AdminImageListComponent } from './admin/admin-image-list/admin-image-list.component';
import { AdminComponent } from './admin/admin.component';
import { DashboardComponent } from './admin/dashboard.component';
import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { routes } from './app.routes';
import { ContactComponent } from './contact/contact.component';
import { GalleryComponent } from './gallery/gallery.component';
import { ImageDetailComponent } from './gallery/image-detail/image-detail.component';
import { ImageListComponent } from './gallery/image-list/image-list.component';
import { ImageComponent } from './gallery/image-list/image.component';
import { NavbarComponent } from './navbar.component';
import { SecondComponent } from './second/second.component';
import { ImageService } from './services/image.service';

@NgModule({
  declarations: [
    AppComponent,
    SecondComponent,
    NavbarComponent,
    GalleryComponent,
    ImageListComponent,
    ImageComponent,
    ImageDetailComponent,
    ContactComponent,
    AboutComponent,
    AdminComponent,
    AdminImageListComponent,
    DashboardComponent,
    AdminImageCreateComponent
  ],
  imports: [
    BrowserModule,
    routes,
    AppRoutingModule,
    FormsModule
  ],
  providers: [ImageService],
  bootstrap: [AppComponent]
})
export class AppModule { }
