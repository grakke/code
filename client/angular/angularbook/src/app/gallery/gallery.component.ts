import { Component, OnInit } from '@angular/core';
import { Image } from '../models/image';

@Component({
  selector: 'app-gallery',
  templateUrl: './gallery.component.html',
  styleUrls: ['./gallery.component.less']
})

export class GalleryComponent implements OnInit {
  selectedImage:Image;
  constructor() { }

  ngOnInit() {}

  selectImage(image: Image) {
    this.selectedImage = image;
  }

}
