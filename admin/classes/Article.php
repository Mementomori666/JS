<?php
/**
 * Created by PhpStorm.
 * User: mysna
 * Date: 28.10.2016
 * Time: 10:34
 */

class Article
{
    private $title_ru;
    private $title_en;
    private $annotation_ru;
    private $annotation_en;
    private $key_words_ru;
    private $key_words_en;
    private $udk;
    private $grnti;
    private $doi;
    private $article_link;
    private $preview_link;
    private $pubyear;
    private $num_mag;

    public function __construct($title_ru = null,
                                $title_en = null,
                                $annotation_ru = null,
                                $annotation_en = null,
                                $key_words_ru = null,
                                $key_words_en = null,
                                $udk = null,
                                $grnti = null,
                                $doi = null,
                                $article_link = null,
                                $preview_link = null,
                                $pubyear = 0,
                                $num_mag = 0)
    {
        $this->title_ru = $this->strClean($title_ru);
        $this->title_en = $this->strClean($title_en);
        $this->annotation_ru = $this->strClean($annotation_ru);
        $this->annotation_en = $this->strClean($annotation_en);
        $this->key_words_ru = $this->strClean($key_words_ru);
        $this->udk = $this->strClean($udk);
        $this->grnti = $this->strClean($grnti);
        $this->doi = $this->strClean($doi);
        $this->article_link = $this->strClean($article_link);
        $this->preview_link = $this->strClean($preview_link);
        $this->pubyear = $this->intClean($pubyear);
        $this->num_mag = $this->intClean($num_mag) ;
    }

    /**
     * @param null $title_ru
     */
    public function setTitleRu($title_ru)
    {
        $this->title_ru = $this->strClean($title_ru);
    }

    /**
     * @param null $title_en
     */
    public function setTitleEn($title_en)
    {
        $this->title_en = $this->strClean($title_en);
    }

    /**
     * @param null $annotation_ru
     */
    public function setAnnotationRu($annotation_ru)
    {
        $this->annotation_ru = $this->strClean($annotation_ru);
    }

    /**
     * @param null $annotation_en
     */
    public function setAnnotationEn($annotation_en)
    {
        $this->annotation_en = $this->strClean($annotation_en);
    }

    /**
     * @param null $key_words_ru
     */
    public function setKeyWordsRu($key_words_ru)
    {
        $this->key_words_ru = $this->strClean($key_words_ru);
    }

    /**
     * @param mixed $key_words_en
     */
    public function setKeyWordsEn($key_words_en)
    {
        $this->key_words_en = $this->strClean($key_words_en);
    }

    /**
     * @param null $udk
     */
    public function setUdk($udk)
    {
        $this->udk = $this->strClean($udk);
    }

    /**
     * @param null $grnti
     */
    public function setGrnti($grnti)
    {
        $this->grnti = $this->strClean($grnti);
    }

    /**
     * @param null $doi
     */
    public function setDoi($doi)
    {
        $this->doi = $this->strClean($doi);
    }

    /**
     * @param null $article_link
     */
    public function setArticleLink($article_link)
    {
        $this->article_link = $this->strClean($article_link);
    }

    /**
     * @param null $preview_link
     */
    public function setPreviewLink($preview_link)
    {
        $this->preview_link = $this->strClean($preview_link);
    }

    /**
     * @param number $pubyear
     */
    public function setPubyear($pubyear)
    {
        $this->pubyear = $this->intClean($pubyear);
    }

    /**
     * @param number $num_mag
     */
    public function setNumMag($num_mag)
    {
        $this->num_mag = $this->intClean($num_mag);
    }

    public function strClean($data)
    {
        return strip_tags(trim($data));
    }
    public function intClean($data){
        return abs((int)$data);
    }

    public function addArticle()
    {
        try {
            $link = Connect::getInstance()->getLink();
            $prepare = "INSERT INTO article (title_ru, title_en, annotation_ru, annotation_en, key_words_ru,
                                key_words_en, udk, grnti, doi, article_link, preview_link, pubyear, num_mag)
                                 VALUES (:title_ru, :title_en, :annotation_ru, :annotation_en, :key_words_ru,
                                :key_words_en, :udk, :grnti, :doi, :article_link, :preview_link, :pubyear, :num_mag)";
            $query = $link->prepare($prepare);
            $query->execute([':title_ru' => $this->title_ru, ':title_en' => $this->title_en,
                ':annotation_ru' => $this->annotation_ru, ':annotation_en' => $this->annotation_en,
                ':key_words_ru' => $this->key_words_ru, ':key_words_en' => $this->key_words_en,
                ':udk' => $this->udk, ':grnti' => $this->grnti, ':doi' => $this->doi,
                ':article_link' => $this->article_link, ':preview_link' => $this->preview_link,
                ':pubyear'=>$this->pubyear, ':num_mag'=>$this->num_mag ]);
            $link->lastInsertId();
            return $link->lastInsertId();;
        } catch (Exception $e) {
            echo $e->getMessage();
            return false;
        }
    }
}