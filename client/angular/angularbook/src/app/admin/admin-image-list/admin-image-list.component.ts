import { Component, OnInit } from '@angular/core';
import { Image } from '../../models/image';
import { ImageService } from '../../services/image.service';
import { Observable } from 'rxjs';

@Component({
  selector: 'app-admin-image-list',
  templateUrl: './admin-image-list.component.html',
  styleUrls: ['./admin-image-list.component.less']
})
export class AdminImageListComponent implements OnInit {
  images: Image[];
  // images: Observable<Image[]>;

  constructor(private imageService: ImageService) { }

  ngOnInit() {
    this.images = this.imageService.getImages();
    console.log(this.images);
  }

}
