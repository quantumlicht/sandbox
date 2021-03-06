<?php
namespace Library;

abstract class Field
{
  protected $errorMessage;
  protected $label;
  protected $name;
  protected $placeholder;
  protected $validators = array();
  protected $value;
  protected $span ='span8';
  protected $has_controlgroup=True;
  protected $tooltip;

  public function __construct(array $options = array())
  {
    if (!empty($options))
    {
      $this->hydrate($options);
    }
  }

  abstract public function buildWidget();

  public function hydrate($options)
  {
    foreach ($options as $type => $value)
    {
      $method = 'set'.ucfirst($type);
      if (is_callable(array($this, $method)))
      {
        $this->$method($value);
      }
    }
  }

  public function isValid()
  {
    foreach ($this->validators as $validator)
    {
      if (!$validator->isValid($this->value))
      {
        $this->errorMessage = $validator->errorMessage();
        return false;
      }
    }

    return true;
  }

  public function fieldcontent(){return $this->fieldcontent;}

  public function has_controlgroup(){return $this->has_controlgroup;}

  public function label(){return $this->label;}

  public function name(){return $this->name;}

  public function placeholder(){return $this->placeholder;}

  public function span(){return $this->span;}

  public function tooltip(){return $this->tooltip;}

  public function validators(){return $this->validators;}

  public function value(){return $this->value;}


  public function setFieldcontent($fieldcontent)
  {
    if (!empty($fieldcontent))
    {
      $this->fieldcontent = $fieldcontent;
    }
  }

  public function setHas_controlgroup($has_controlgroup)
  {
    if (is_bool($has_controlgroup))
    {
      $this->has_controlgroup = $has_controlgroup;
    }
  }

  public function setLabel($label)
  {
    if (is_string($label))
    {
      $this->label = $label;
    }
  }

  public function setName($name)
  {
    if (is_string($name))
    {
      $this->name = $name;
    }
  }

  public function setPlaceholder($placeholder)
  {
    if (is_string($placeholder))
    {
      $this->placeholder = $placeholder;
    }
  }

  public function setSpan($span)
  {
    if (is_string($span) && preg_match('/^span/', $span))
    {
      $this->span = $span;
    }
  }

  public function setTooltip($tooltip)
  {
    if (!empty($tooltip) && is_string($tooltip))
    {
      $this->tooltip = $tooltip;
    }
  }

  public function setValidators(array $validators)
  {
    foreach ($validators as $validator)
    {
      if ($validator instanceof Validator && !in_array($validator, $this->validators))
      {
        $this->validators[] = $validator;
      }
    }
  }

  public function setValue($value)
  {
    if (is_string($value))
    {
      $this->value = $value;
    }
  }

}
