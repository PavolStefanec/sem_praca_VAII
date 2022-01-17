<?php

namespace App\Controllers;

use App\Config\Configuration;
use App\Core\Responses\Response;
use App\Models\Bands;
use App\Models\Bands_Imgs;
use http\Message;
use App\Auth;
use mysql_xdevapi\Exception;

class BandController extends AControllerRedirect
{

    /**
     * @inheritDoc
     */
    public function index()
    {
        return $this->html();
    }

    public function getAllBands(){
        $bands = Bands::getAll();
        $logged = Auth::isLogged();
        return $this->json([$bands, $logged]);
    }

    public function bands()
    {
        $bands = Bands::getAll();

        return $this->html(
            [
                'bands' => $bands
            ]);
    }

    public function bandForm()
    {
        return $this->html(
            [
                'error' => $this->request()->getValue('error')
            ]
        );
    }

    public function bandPage()
    {
        $id = $this->request()->getValue('id');
        $band = Bands::getOne($id);
        $images = Bands_Imgs::getAll("id_band = ?", [$id]);

        return $this->html(
            [
                'band' => $band,
                'images' => $images
            ]);
    }

    public function addBand()
    {
        $name = $this->request()->getValue('name');
        $bio = $this->request()->getValue('bio');
        $members = $this->request()->getValue('members');
        $disco = $this->request()->getValue('disco');

        if ($_FILES['logo']['error'] == UPLOAD_ERR_OK) {
            $file = date('Y-a-d-H-i-s') . $_FILES['logo']['name'];
            move_uploaded_file($_FILES['logo']['tmp_name'], Configuration::UPLOAD_DIR . "$file");
        }

        $newBand = new Bands();
        $newBand->setName($name);
        $newBand->setBio($bio);
        $newBand->setMembers($members);
        $newBand->setDiscography($disco);
        $newBand->setLogoSrc($file);
        $newBand->save();

        $bandID = Bands::getAll("name = ?", [$name])[0]->getId();

        for ($i = 0; $i < count($_FILES['file']['name']); $i++) {
            if ($_FILES['file']['error'][$i] == UPLOAD_ERR_OK) {
                $newImg = new Bands_Imgs();
                $newImg->setIdBand($bandID);
                $file = date('Y-a-d-H-i-s') . $_FILES['file']['name'][$i];
                move_uploaded_file($_FILES['file']['tmp_name'][$i], Configuration::UPLOAD_DIR . "$file");
                $newImg->setImageSrc($file);
                $newImg->save();
            }
        }

        $this->redirect('band', 'bands', ['message'=>'band successfully added']);
    }

    public function modifyForm()
    {
        $id = $this->request()->getValue('id');
        $band = Bands::getOne($id);
        return $this->html(
            [
                'band' => $band,
                'error' => $this->request()->getValue('error')
            ]
        );
    }

    public function modifyBand()
    {
        $id = $this->request()->getValue('id');
        if ($id != null) {
            $bio = $this->request()->getValue('bio');
            $members = $this->request()->getValue('members');
            $disco = $this->request()->getValue('disco');
            $logo = $this->request()->getValue('logo');
            $band = Bands::getOne($id);

            if ($bio != null)
                $band->setBio($bio);
            if ($members != null)
                $band->setMembers($members);
            if ($disco != null)
                $band->setDiscoGraphy($disco);
            if ($logo != null)
                $band->setLogo($logo);

            $band->save();
        }

        $this->redirect('band', 'bands', ['message'=>'band successfully modified']);
    }

    public function deleteBand()
    {
        try {
            Bands::getOne($this->request()->getValue('id'))->delete();
            $imgs = Bands_Imgs::getAll("id_band = ?", [$this->request()->getValue('id')]);
            foreach ($imgs as $value) {
                $value->delete();
            }
            return $this->json("true");
        } catch (Exception $e) {
            return $this->json("false");
        }
    }
}