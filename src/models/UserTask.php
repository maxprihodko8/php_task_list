<?php
/**
 * Created by PhpStorm.
 * User: maxprihodko8
 * Date: 08.10.17
 * Time: 19:52
 */

namespace src\models;


class UserTask implements Task
{
    public $userName;
    public $email;
    public $text;
    public $image;
    public $status;
    public $is_completed;

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }


    /**
     * @return mixed
     */
    public function getUserName()
    {
        return $this->userName;
    }

    /**
     * @param mixed $userName
     */
    public function setUserName($userName)
    {
        $this->userName = $userName;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @param mixed $text
     */
    public function setText($text)
    {
        $this->text = $text;
    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param mixed $image
     */
    public function setImage($image)
    {
        $this->image = $image;
    }

    /**
     * @return mixed
     */
    public function getIsCompleted()
    {
        return $this->is_completed;
    }

    /**
     * @param mixed $is_completed
     */
    public function setIsCompleted($is_completed)
    {
        $this->is_completed = $is_completed;
    }

}