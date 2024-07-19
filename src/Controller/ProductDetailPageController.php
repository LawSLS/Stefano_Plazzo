<?php

namespace App\Controller;

use App\Entity\ParisValeurFonciere;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ProductDetailPageController extends AbstractController
{
    #[Route('/pdp/{id}', name: 'app_pdp')]
    public function showProperty(EntityManagerInterface $em, int $id): Response
    {
        $picturePath = ["https://www.verocotrel.fr/wp-content/uploads/2017/10/tito6323.jpg",
    "https://projets.cotemaison.fr/uploads/projects/5806/project_85290596cdb02bae8b_pic_1.jpg",
"https://www.verocotrel.fr/wp-content/uploads/2017/10/tito6308.jpg"];

$property = $em->getRepository(ParisValeurFonciere::class)->find($id);
$valeur = $property->getValeurFonciere();

       
        return $this->render('product_detail_page/pdp.html.twig', [
            'controller_name' => 'ProductDetailPageController',
            'photo' => $picturePath[0],
            'photo1' => $picturePath[1],
            'photo2' => $picturePath[2],
            'property' => $property,
            'price' => number_format($valeur, 0, '.', ' ')
        ]);
    }
}
