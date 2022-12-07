<?php

namespace App\Controller;

use App\Entity\Seance;
use App\Repository\SeanceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


#[Route('/cart', name: 'cart_')]
class CartController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(): Response
    {
        return $this->render('cart/index.html.twig', [   
        ]);
    }

  #[Route('/add/{id<[0-9]+>}', name: 'add')]
   public function add(Seance $seance, SessionInterface $session)
   {
      // on récupère le panier actuel
      $cart = $session->get("cart", []);
      $id = $seance->getId();

     if(!empty($cart[$id])){
       $cart[$id]++;
       }else{
      $cart[$id] = 1;
      }
     //  on sauvegarde dans la session
      $session->set("cart", $cart);
        dd($session);
    }

    //#[Route('/add/{id<[0-9]+>}', name: 'add')]
  //  public function add($id, SessionInterface $session)
 //   {
       // on récupère le panier actuel
   //    $cart = $session->get("cart", []);
    
  //     if(!empty($cart[$id])){
   //     $cart[$id]++;
   //    }else{
   //     $cart[$id] = 1;
   //    }
       //on sauvegarde dans la session
    //   $session->set("cart", $cart);
        
    //   return $this->redirectToRoute('cart_index');
    //}


  




}
