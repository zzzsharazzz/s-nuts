<?php

namespace Admin\Form;

use Zend\Form\Form;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;

class LoginForm extends Form implements InputFilterAwareInterface
{
    protected $inputFilter;
    public function __construct()
    {
        parent::__construct('admin');

        $this->add([
           'name' => 'email',
            'type' => 'Email',
            'attributes' => [
                'class' => 'form-control',
                'placeholder' => 'E-mail',
                'autofocus' => 'autofocus'
            ]
        ]);

        $this->add([
            'name' => 'password',
            'type' => 'Password',
            'attributes' => [
                'class' => 'form-control',
                'placeholder' => 'Password'
            ]
        ]);

        $this->add([
            'name' => 'remember',
            'type' => 'checkbox'
        ]);

        $this->add([
            'name' => 'submit',
            'type' => 'submit',
            'attributes' => [
                'value' => 'Login',
                'id' => 'submitbutton',
                'class' => 'btn btn-lg btn-success btn-block'
            ]
        ]);
    }

    /*// Add content to these methods:
    public function setInputFilter(InputFilterInterface $inputFilter)
    {
        throw new \Exception("Not used");
    }*/

    public function getInputFilter()
    {
        if (!$this->inputFilter) {
            $inputFilter = new InputFilter();

            $inputFilter->add( array(
                'name' => 'email',
                'validators' => array(
                    array(
                        'name' => 'NotEmpty',
                        'options' => array(
                            'messages' => array(
                                \Zend\Validator\NotEmpty::IS_EMPTY => 'Please enter a value for email!',
                            ),
                        ),
                    ),
                    array(
                        'name' => 'EmailAddress',
                        'options' => array(
                            'messages' => array(
                                \Zend\Validator\EmailAddress::INVALID_FORMAT => 'Please enter a valid email format!',
                            ),
                        ),
                    ),
                ),
            ) );

            $inputFilter->add( array(
                'name' => 'password',
                'validators' => array(
                    array(
                        'name' => 'NotEmpty',
                        'options' => array(
                            'messages' => array(
                                \Zend\Validator\NotEmpty::IS_EMPTY => 'Please enter a value for password!',
                            ),
                        ),
                    ),
                ),
            ) );

            $this->inputFilter = $inputFilter;
            return $inputFilter;
        }
        return $this->inputFilter;
    }
}