<?php

/* 
 * validator.php class
    * Validations
         *  -string
         *  -email
         *  -url
         *  -ip
         *  -integer value
         *  -requied(not empty)
    * Sanitizationتطهير
         *  -string
         *  -email
         *  -url
         *  -ip
 */

class validator
{
    function validate($data,$rules)
    {
        $valid=TRUE;
        foreach ($rules as $key => $rule) 
        {
            $callbacks=  explode('|', $rule);
            foreach ($callbacks as $callback)
            {
                $value=  isset($data[$key]) ? $data[$key] : NULL;
                if(is_array($value))
                {
                    foreach ($value as $val)
                    if($this->$callback($val,$key)==FALSE)
                        $valid=FALSE;
                }
                else {
                    if($this->$callback($value,$key)==FALSE)
                        $valid=FALSE;
                }
            }
        }
        return $valid;
    }
    function checkString($value,$key)
    {
        
        $pattern="'[a-zA-Z]'";
        $validate=  preg_match($pattern, $value);
        if($validate==FALSE)
        {
            echo "Error the $key must be a string";
            throw new Exception("Error the $key must be a string");
        }
        return $validate;
    }
    function checkEmail($value,$key)
    {
        $validate=filter_var($value,FILTER_VALIDATE_EMAIL);
        if($validate==FALSE)
        {
            echo "Error the $key must be a email";
            throw new Exception("Error the $key must be a email");
        }
        return $validate;
    }
    function checkUrl($value,$key)
    {
        $validate=filter_var($value,FILTER_VALIDATE_URL);
        if($validate==FALSE)
            {
            echo "Error the $key must be a string";
            throw new Exception("Error the $key must be valid url");
            }
        return $validate;
    }
    function checkIP($value,$key)
    {
        $validate=filter_var($value,FILTER_VALIDATE_IP);
        if($validate==FALSE)
            throw new Exception("Error the $key must be valid IP");
        return $validate;
    }
    function checkinteger($value,$key)
    {
        $validate=filter_var($value,FILTER_VALIDATE_INT);
        if($validate==FALSE)
            throw new Exception("Error the $key must be valid integer");
        return $validate;
    }
    function checkRequied($value,$key)
    {
        $validate=  !empty($value);
        if($validate==FALSE)
        {
            echo "Error the $key must be not Empty";
            throw new Exception("Error the $key must be not Empty");
        }
        return $validate;
    }
    function sanitizeItrm($value,$key)
    {
        $flag=NULL;
        switch ($key) {
            case 'email':
                $filter=FILTER_SANITIZE_EMAIL;
                break;
            
            case 'url':
                $filter=FILTER_SANITIZE_URL;
                break;
            
            case 'int':
                $filter=FILTER_SANITIZE_NUMBER_INT;
                break;
          
            default:
                $filter=FILTER_SANITIZE_STRING;
                $flag=FILTER_FLAG_NO_ENCODE_QUOTES;
                break;
        }
        $validate=  filter_var($value,$filter,$flag);
        if($validate==FALSE)
            throw new Exception("Error the $key must be invalid!");
        return $validate;
    }
}