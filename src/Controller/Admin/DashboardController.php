<?php

namespace App\Controller\Admin;

use App\Entity\Category;
use App\Entity\Invoice;
use App\Entity\Offer;
use App\Entity\Order;
use App\Entity\Product;
use App\Entity\Restaurant;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Contracts\Controller\DashboardControllerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController implements DashboardControllerInterface
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {

        // Option 1. You can make your dashboard redirect to some common page of your backend
        //
        // $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        // return $this->redirect($adminUrlGenerator->setController(OneOfYourCrudController::class)->generateUrl());

        // Option 2. You can make your dashboard redirect to different pages depending on the user
        //
        // if ('jane' === $this->getUser()->getUsername()) {
        //     return $this->redirect('...');
        // }

        // Option 3. You can render some custom template to display a proper dashboard with widgets, etc.
        // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
        //
        return $this->render('admin/dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Restaurantsapp');
    }

    public function configureMenuItems(): iterable
    {
         yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');

         yield MenuItem::section('Manage');
         yield MenuItem::linkToCrud('User', 'fa fa-box', user::class);
         

         yield MenuItem::section('Restaurant Settings');
         yield MenuItem::linkToCrud('Category', 'fas fa-book', Category::class);
         yield MenuItem::linkToCrud('Restaurant', 'fa fa-coffee', Restaurant::class);
 
         yield MenuItem::section('Management');
         yield MenuItem::linkToCrud('Offer', 'fa fa-tag', Offer::class);
         yield MenuItem::linkToCrud('Order', 'fa fa-shopping-cart', Order::class);
         yield MenuItem::linkToCrud('Product', 'fa fa-box', Product::class);
         yield MenuItem::linkToCrud('Invoice', 'fa fa-file-invoice', Invoice::class);

 
 
     }
 }
    

