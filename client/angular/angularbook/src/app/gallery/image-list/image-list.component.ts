import { Component, OnInit, EventEmitter, Output } from '@angular/core';
import {Image} from '../../models/image'
import {ImageService} from '../../services/image.service'

@Component({
  selector: 'app-image-list',
  templateUrl: './image-list.component.html',
  styles: []
})
export class ImageListComponent implements OnInit {
  images: Image[] = [];
  selectedImage:Image;

  constructor(private imageService:ImageService) { }
  @Output() selectedEvent: EventEmitter<Image> = new EventEmitter<Image>();

  ngOnInit() {
    this.images = this.imageService.getImages();
  }
  onSelect(image:Image){
    // this.selectedImage = image;
    this.selectedEvent.emit(image);
  }
}
