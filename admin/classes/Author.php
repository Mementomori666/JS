<?php
/**
 * Created by PhpStorm.
 * User: mysna
 * Date: 28.10.2016
 * Time: 10:42
 */

class Author
{
    private $fio_ru;
    private $fio_en;
    private $current_job;
    private $email;
    private $article_id;
    /**
     * AddAuthors constructor.
     * @param $fio_ru
     * @param $fio_en
     * @param $current_job
     * @param $email
     */
    public function __construct($fio_ru = null, $fio_en = null, $current_job = null,
                                $email = null, $article_id = 0)
    {
        $this->fio_ru = $this->strClean($fio_ru);
        $this->fio_en = $this->strClean($fio_en);
        $this->current_job = $this->strClean($current_job);
        $this->email = $this->strClean($email);

    }

    /**
     * @param null $fio_ru
     */
    public function setFioRu($fio_ru)
    {
        $this->fio_ru = $this->strClean($fio_ru);
    }

    /**
     * @param null $fio_en
     */
    public function setFioEn($fio_en)
    {
        $this->fio_en = $this->strClean($fio_en);
    }

    /**
     * @param null $current_job
     */
    public function setCurrentJob($current_job)
    {
        $this->current_job = $this->strClean($current_job);
    }

    /**
     * @param null $email
     */
    public function setEmail($email)
    {
        $this->email = $this->strClean($email);
    }

    public function strClean($data)
    {
        return strip_tags(trim($data));
    }

    public function addAuthor()
    {
        try {
            $link = Connect::getInstance()->getLink();
            $result = $link->query('SELECT MAX(id) as id FROM article',PDO::FETCH_ASSOC);
            $result = $result->fetchAll();       
            $this->article_id = $result[0]['id'];
            if($this->article_id==null) $this->article_id = 0;
            $prepare = "INSERT INTO author (fio_ru, fio_en, current_job, email, article_id)
                      VALUES (:fio_ru, :fio_en, :current_job, :email, :article_id)";
            $query = $link->prepare($prepare);
            $query->execute([':fio_ru' => $this->fio_ru, ':fio_en' => $this->fio_en,
                ':current_job' => $this->current_job, ':email' => $this->email,
                ':article_id'=>$this->article_id ]);
          
            return true;
        } catch (Exception $e) {
            echo $e->getMessage();
            return false;
        }
    }
}