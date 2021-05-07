<?php

namespace DoctrineORMModule\Proxy\__CG__\Restaurant\Entity;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class TableWithDishDescriptionRestaurant extends \Restaurant\Entity\TableWithDishDescriptionRestaurant implements \Doctrine\ORM\Proxy\Proxy
{
    /**
     * @var \Closure the callback responsible for loading properties in the proxy object. This callback is called with
     *      three parameters, being respectively the proxy object to be initialized, the method that triggered the
     *      initialization process and an array of ordered parameters that were passed to that method.
     *
     * @see \Doctrine\Common\Proxy\Proxy::__setInitializer
     */
    public $__initializer__;

    /**
     * @var \Closure the callback responsible of loading properties that need to be copied in the cloned object
     *
     * @see \Doctrine\Common\Proxy\Proxy::__setCloner
     */
    public $__cloner__;

    /**
     * @var boolean flag indicating if this object was already initialized
     *
     * @see \Doctrine\Persistence\Proxy::__isInitialized
     */
    public $__isInitialized__ = false;

    /**
     * @var array<string, null> properties to be lazy loaded, indexed by property name
     */
    public static $lazyPropertiesNames = array (
);

    /**
     * @var array<string, mixed> default values of properties to be lazy loaded, with keys being the property names
     *
     * @see \Doctrine\Common\Proxy\Proxy::__getLazyProperties
     */
    public static $lazyPropertiesDefaults = array (
);



    public function __construct(?\Closure $initializer = null, ?\Closure $cloner = null)
    {

        $this->__initializer__ = $initializer;
        $this->__cloner__      = $cloner;
    }







    /**
     * 
     * @return array
     */
    public function __sleep()
    {
        if ($this->__isInitialized__) {
            return ['__isInitialized__', '' . "\0" . 'Restaurant\\Entity\\TableWithDishDescriptionRestaurant' . "\0" . 'id', '' . "\0" . 'Restaurant\\Entity\\TableWithDishDescriptionRestaurant' . "\0" . 'headDish1', '' . "\0" . 'Restaurant\\Entity\\TableWithDishDescriptionRestaurant' . "\0" . 'headDish2', '' . "\0" . 'Restaurant\\Entity\\TableWithDishDescriptionRestaurant' . "\0" . 'textDescription1', '' . "\0" . 'Restaurant\\Entity\\TableWithDishDescriptionRestaurant' . "\0" . 'textDescription2', '' . "\0" . 'Restaurant\\Entity\\TableWithDishDescriptionRestaurant' . "\0" . 'textDescription3', '' . "\0" . 'Restaurant\\Entity\\TableWithDishDescriptionRestaurant' . "\0" . 'textDescription4', '' . "\0" . 'Restaurant\\Entity\\TableWithDishDescriptionRestaurant' . "\0" . 'nameAutor', '' . "\0" . 'Restaurant\\Entity\\TableWithDishDescriptionRestaurant' . "\0" . 'textAutora', '' . "\0" . 'Restaurant\\Entity\\TableWithDishDescriptionRestaurant' . "\0" . 'photoAutor', '' . "\0" . 'Restaurant\\Entity\\TableWithDishDescriptionRestaurant' . "\0" . 'photo1', '' . "\0" . 'Restaurant\\Entity\\TableWithDishDescriptionRestaurant' . "\0" . 'photo2', '' . "\0" . 'Restaurant\\Entity\\TableWithDishDescriptionRestaurant' . "\0" . 'dishId', '' . "\0" . 'Restaurant\\Entity\\TableWithDishDescriptionRestaurant' . "\0" . 'commentAll'];
        }

        return ['__isInitialized__', '' . "\0" . 'Restaurant\\Entity\\TableWithDishDescriptionRestaurant' . "\0" . 'id', '' . "\0" . 'Restaurant\\Entity\\TableWithDishDescriptionRestaurant' . "\0" . 'headDish1', '' . "\0" . 'Restaurant\\Entity\\TableWithDishDescriptionRestaurant' . "\0" . 'headDish2', '' . "\0" . 'Restaurant\\Entity\\TableWithDishDescriptionRestaurant' . "\0" . 'textDescription1', '' . "\0" . 'Restaurant\\Entity\\TableWithDishDescriptionRestaurant' . "\0" . 'textDescription2', '' . "\0" . 'Restaurant\\Entity\\TableWithDishDescriptionRestaurant' . "\0" . 'textDescription3', '' . "\0" . 'Restaurant\\Entity\\TableWithDishDescriptionRestaurant' . "\0" . 'textDescription4', '' . "\0" . 'Restaurant\\Entity\\TableWithDishDescriptionRestaurant' . "\0" . 'nameAutor', '' . "\0" . 'Restaurant\\Entity\\TableWithDishDescriptionRestaurant' . "\0" . 'textAutora', '' . "\0" . 'Restaurant\\Entity\\TableWithDishDescriptionRestaurant' . "\0" . 'photoAutor', '' . "\0" . 'Restaurant\\Entity\\TableWithDishDescriptionRestaurant' . "\0" . 'photo1', '' . "\0" . 'Restaurant\\Entity\\TableWithDishDescriptionRestaurant' . "\0" . 'photo2', '' . "\0" . 'Restaurant\\Entity\\TableWithDishDescriptionRestaurant' . "\0" . 'dishId', '' . "\0" . 'Restaurant\\Entity\\TableWithDishDescriptionRestaurant' . "\0" . 'commentAll'];
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (TableWithDishDescriptionRestaurant $proxy) {
                $proxy->__setInitializer(null);
                $proxy->__setCloner(null);

                $existingProperties = get_object_vars($proxy);

                foreach ($proxy::$lazyPropertiesDefaults as $property => $defaultValue) {
                    if ( ! array_key_exists($property, $existingProperties)) {
                        $proxy->$property = $defaultValue;
                    }
                }
            };

        }
    }

    /**
     * 
     */
    public function __clone()
    {
        $this->__cloner__ && $this->__cloner__->__invoke($this, '__clone', []);
    }

    /**
     * Forces initialization of the proxy
     */
    public function __load()
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, '__load', []);
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __isInitialized()
    {
        return $this->__isInitialized__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitialized($initialized)
    {
        $this->__isInitialized__ = $initialized;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitializer(\Closure $initializer = null)
    {
        $this->__initializer__ = $initializer;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __getInitializer()
    {
        return $this->__initializer__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setCloner(\Closure $cloner = null)
    {
        $this->__cloner__ = $cloner;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific cloning logic
     */
    public function __getCloner()
    {
        return $this->__cloner__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     * @deprecated no longer in use - generated code now relies on internal components rather than generated public API
     * @static
     */
    public function __getLazyProperties()
    {
        return self::$lazyPropertiesDefaults;
    }

    
    /**
     * {@inheritDoc}
     */
    public function setCommentAll($commantAll)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCommentAll', [$commantAll]);

        return parent::setCommentAll($commantAll);
    }

    /**
     * {@inheritDoc}
     */
    public function getCommentAll()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCommentAll', []);

        return parent::getCommentAll();
    }

    /**
     * {@inheritDoc}
     */
    public function setId($id)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setId', [$id]);

        return parent::setId($id);
    }

    /**
     * {@inheritDoc}
     */
    public function setHeadDish1($headDish1)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setHeadDish1', [$headDish1]);

        return parent::setHeadDish1($headDish1);
    }

    /**
     * {@inheritDoc}
     */
    public function setHeadDish2($headDish2)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setHeadDish2', [$headDish2]);

        return parent::setHeadDish2($headDish2);
    }

    /**
     * {@inheritDoc}
     */
    public function setNameAutor($nameAutor)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setNameAutor', [$nameAutor]);

        return parent::setNameAutor($nameAutor);
    }

    /**
     * {@inheritDoc}
     */
    public function setPhoto1($photo1)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setPhoto1', [$photo1]);

        return parent::setPhoto1($photo1);
    }

    /**
     * {@inheritDoc}
     */
    public function setPhoto2($photo2)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setPhoto2', [$photo2]);

        return parent::setPhoto2($photo2);
    }

    /**
     * {@inheritDoc}
     */
    public function setPhotoAutor($photoAutor)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setPhotoAutor', [$photoAutor]);

        return parent::setPhotoAutor($photoAutor);
    }

    /**
     * {@inheritDoc}
     */
    public function setTextAutora($textAutora)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setTextAutora', [$textAutora]);

        return parent::setTextAutora($textAutora);
    }

    /**
     * {@inheritDoc}
     */
    public function setTextDescription1($textDescription1)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setTextDescription1', [$textDescription1]);

        return parent::setTextDescription1($textDescription1);
    }

    /**
     * {@inheritDoc}
     */
    public function setTextDescription2($textDescription2)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setTextDescription2', [$textDescription2]);

        return parent::setTextDescription2($textDescription2);
    }

    /**
     * {@inheritDoc}
     */
    public function setTextDescription3($textDescription3)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setTextDescription3', [$textDescription3]);

        return parent::setTextDescription3($textDescription3);
    }

    /**
     * {@inheritDoc}
     */
    public function setTextDescription4($textDescription4)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setTextDescription4', [$textDescription4]);

        return parent::setTextDescription4($textDescription4);
    }

    /**
     * {@inheritDoc}
     */
    public function setDishId($dishId)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setDishId', [$dishId]);

        return parent::setDishId($dishId);
    }

    /**
     * {@inheritDoc}
     */
    public function getId()
    {
        if ($this->__isInitialized__ === false) {
            return (int)  parent::getId();
        }


        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getId', []);

        return parent::getId();
    }

    /**
     * {@inheritDoc}
     */
    public function getHeadDish1()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getHeadDish1', []);

        return parent::getHeadDish1();
    }

    /**
     * {@inheritDoc}
     */
    public function getHeadDish2()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getHeadDish2', []);

        return parent::getHeadDish2();
    }

    /**
     * {@inheritDoc}
     */
    public function getNameAutor()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getNameAutor', []);

        return parent::getNameAutor();
    }

    /**
     * {@inheritDoc}
     */
    public function getPhoto1()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPhoto1', []);

        return parent::getPhoto1();
    }

    /**
     * {@inheritDoc}
     */
    public function getPhoto2()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPhoto2', []);

        return parent::getPhoto2();
    }

    /**
     * {@inheritDoc}
     */
    public function getPhotoAutor()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPhotoAutor', []);

        return parent::getPhotoAutor();
    }

    /**
     * {@inheritDoc}
     */
    public function getTextAutora()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getTextAutora', []);

        return parent::getTextAutora();
    }

    /**
     * {@inheritDoc}
     */
    public function getTextDescription1()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getTextDescription1', []);

        return parent::getTextDescription1();
    }

    /**
     * {@inheritDoc}
     */
    public function getTextDescription2()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getTextDescription2', []);

        return parent::getTextDescription2();
    }

    /**
     * {@inheritDoc}
     */
    public function getTextDescription3()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getTextDescription3', []);

        return parent::getTextDescription3();
    }

    /**
     * {@inheritDoc}
     */
    public function getTextDescription4()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getTextDescription4', []);

        return parent::getTextDescription4();
    }

    /**
     * {@inheritDoc}
     */
    public function getDishId()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getDishId', []);

        return parent::getDishId();
    }

}
