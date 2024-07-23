import { Component, OnInit, Input } from '@angular/core';
import { Image } from 'src/app/models/image';

@Component({
  selector: 'app-image-detail',
  templateUrl: './image-detail.component.html',
  styleUrls: ['./image-detail.component.less']
})
export class ImageDetailComponent implements OnInit {
  @Input() selectedImage:Image;
  constructor() { }

  ngOnInit() {
  }

}
