<?php
namespace Applications\Frontend\Modules\Indexvins;

class IndexvinsController extends \Library\BackController
{
  public function executeIndex(\Library\HTTPRequest $request)
  {
    
    // On ajoute une définition pour le titre.
    $this->page->addVar('title', 'Index des vins');
    
    // Si le formulaire a été envoyé.
    if ($request->method() == 'POST')
    {
      $fichevin = new \Library\Entities\Fichevin(array(
        'nom' => $request->postData('nom'),
        'producteur' => $request->postData('producteur'),
        'annee' => $request->postData('annee'),
        'appelation' => $request->postData('appelation'),
        'pays' => $request->postData('pays'),
        'region' => $request->postData('region'),
        'alcool' => $request->postData('alcool'),
        'date' => $request->postData('date'),
        'code_saq' => $request->postData('code_saq'),
        'prix' => $request->postData('prix'),
        'teinte' => $request->postData('teinte'),
        'nez_intensite' => $request->postData('nez_intensite'),
        'arome' => $request->postData('arome'),
        'nez_impression' => $request->postData('nez_impression'),
        'bouche_intensite' => $request->postData('bouche_intensite'),
        'persistance' => $request->postData('persistance'),
        'saveur' => $request->postData('saveur'),
        'acidite' => $request->postData('acidite'),
        'tanin' => $request->postData('tanin'),
        'bouche_impression' => $request->postData('bouche_impression'),
        'couleur' => $request->postData('couleur')
      ));
    }
    else
    {
      $fichevin = new \Library\Entities\Fichevin;
    }
    $formBuilder = new \Library\FormBuilder\FichevinFormBuilder($fichevin);
    $formBuilder->build();
  
    $form = $formBuilder->form();
    $formHandler = new \Library\FormHandler($form, $this->managers->getManagerOf('Vins'), $request);
    
    if ($formHandler->process())
    {
      $this->app->user()->setFlash('La fiche de vin a bien été ajoutée, merci !');
      $this->app->httpResponse()->redirect('.');
    }
    
    $this->page->addVar('form', $form->createView());
  }
    
}
