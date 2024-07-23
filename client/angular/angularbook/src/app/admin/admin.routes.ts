import { Routes } from '@angular/router';
import { AdminImageListComponent } from './admin-image-list/admin-image-list.component';
import { DashboardComponent } from './dashboard.component';
import { AdminImageCreateComponent} from './admin-image-create/admin-image-create.component';

export const adminRoutes: Routes = [
  { path: '', component: DashboardComponent },
  { path: 'images', component: AdminImageListComponent },
  { path: 'images/create', component: AdminImageCreateComponent }
];
