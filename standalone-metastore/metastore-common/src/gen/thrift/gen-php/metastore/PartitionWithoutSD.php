<?php
namespace metastore;

/**
 * Autogenerated by Thrift Compiler (0.13.0)
 *
 * DO NOT EDIT UNLESS YOU ARE SURE THAT YOU KNOW WHAT YOU ARE DOING
 *  @generated
 */
use Thrift\Base\TBase;
use Thrift\Type\TType;
use Thrift\Type\TMessageType;
use Thrift\Exception\TException;
use Thrift\Exception\TProtocolException;
use Thrift\Protocol\TProtocol;
use Thrift\Protocol\TBinaryProtocolAccelerated;
use Thrift\Exception\TApplicationException;

class PartitionWithoutSD
{
    static public $isValidate = false;

    static public $_TSPEC = array(
        1 => array(
            'var' => 'values',
            'isRequired' => false,
            'type' => TType::LST,
            'etype' => TType::STRING,
            'elem' => array(
                'type' => TType::STRING,
                ),
        ),
        2 => array(
            'var' => 'createTime',
            'isRequired' => false,
            'type' => TType::I32,
        ),
        3 => array(
            'var' => 'lastAccessTime',
            'isRequired' => false,
            'type' => TType::I32,
        ),
        4 => array(
            'var' => 'relativePath',
            'isRequired' => false,
            'type' => TType::STRING,
        ),
        5 => array(
            'var' => 'parameters',
            'isRequired' => false,
            'type' => TType::MAP,
            'ktype' => TType::STRING,
            'vtype' => TType::STRING,
            'key' => array(
                'type' => TType::STRING,
            ),
            'val' => array(
                'type' => TType::STRING,
                ),
        ),
        6 => array(
            'var' => 'privileges',
            'isRequired' => false,
            'type' => TType::STRUCT,
            'class' => '\metastore\PrincipalPrivilegeSet',
        ),
    );

    /**
     * @var string[]
     */
    public $values = null;
    /**
     * @var int
     */
    public $createTime = null;
    /**
     * @var int
     */
    public $lastAccessTime = null;
    /**
     * @var string
     */
    public $relativePath = null;
    /**
     * @var array
     */
    public $parameters = null;
    /**
     * @var \metastore\PrincipalPrivilegeSet
     */
    public $privileges = null;

    public function __construct($vals = null)
    {
        if (is_array($vals)) {
            if (isset($vals['values'])) {
                $this->values = $vals['values'];
            }
            if (isset($vals['createTime'])) {
                $this->createTime = $vals['createTime'];
            }
            if (isset($vals['lastAccessTime'])) {
                $this->lastAccessTime = $vals['lastAccessTime'];
            }
            if (isset($vals['relativePath'])) {
                $this->relativePath = $vals['relativePath'];
            }
            if (isset($vals['parameters'])) {
                $this->parameters = $vals['parameters'];
            }
            if (isset($vals['privileges'])) {
                $this->privileges = $vals['privileges'];
            }
        }
    }

    public function getName()
    {
        return 'PartitionWithoutSD';
    }


    public function read($input)
    {
        $xfer = 0;
        $fname = null;
        $ftype = 0;
        $fid = 0;
        $xfer += $input->readStructBegin($fname);
        while (true) {
            $xfer += $input->readFieldBegin($fname, $ftype, $fid);
            if ($ftype == TType::STOP) {
                break;
            }
            switch ($fid) {
                case 1:
                    if ($ftype == TType::LST) {
                        $this->values = array();
                        $_size243 = 0;
                        $_etype246 = 0;
                        $xfer += $input->readListBegin($_etype246, $_size243);
                        for ($_i247 = 0; $_i247 < $_size243; ++$_i247) {
                            $elem248 = null;
                            $xfer += $input->readString($elem248);
                            $this->values []= $elem248;
                        }
                        $xfer += $input->readListEnd();
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 2:
                    if ($ftype == TType::I32) {
                        $xfer += $input->readI32($this->createTime);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 3:
                    if ($ftype == TType::I32) {
                        $xfer += $input->readI32($this->lastAccessTime);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 4:
                    if ($ftype == TType::STRING) {
                        $xfer += $input->readString($this->relativePath);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 5:
                    if ($ftype == TType::MAP) {
                        $this->parameters = array();
                        $_size249 = 0;
                        $_ktype250 = 0;
                        $_vtype251 = 0;
                        $xfer += $input->readMapBegin($_ktype250, $_vtype251, $_size249);
                        for ($_i253 = 0; $_i253 < $_size249; ++$_i253) {
                            $key254 = '';
                            $val255 = '';
                            $xfer += $input->readString($key254);
                            $xfer += $input->readString($val255);
                            $this->parameters[$key254] = $val255;
                        }
                        $xfer += $input->readMapEnd();
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 6:
                    if ($ftype == TType::STRUCT) {
                        $this->privileges = new \metastore\PrincipalPrivilegeSet();
                        $xfer += $this->privileges->read($input);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                default:
                    $xfer += $input->skip($ftype);
                    break;
            }
            $xfer += $input->readFieldEnd();
        }
        $xfer += $input->readStructEnd();
        return $xfer;
    }

    public function write($output)
    {
        $xfer = 0;
        $xfer += $output->writeStructBegin('PartitionWithoutSD');
        if ($this->values !== null) {
            if (!is_array($this->values)) {
                throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
            }
            $xfer += $output->writeFieldBegin('values', TType::LST, 1);
            $output->writeListBegin(TType::STRING, count($this->values));
            foreach ($this->values as $iter256) {
                $xfer += $output->writeString($iter256);
            }
            $output->writeListEnd();
            $xfer += $output->writeFieldEnd();
        }
        if ($this->createTime !== null) {
            $xfer += $output->writeFieldBegin('createTime', TType::I32, 2);
            $xfer += $output->writeI32($this->createTime);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->lastAccessTime !== null) {
            $xfer += $output->writeFieldBegin('lastAccessTime', TType::I32, 3);
            $xfer += $output->writeI32($this->lastAccessTime);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->relativePath !== null) {
            $xfer += $output->writeFieldBegin('relativePath', TType::STRING, 4);
            $xfer += $output->writeString($this->relativePath);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->parameters !== null) {
            if (!is_array($this->parameters)) {
                throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
            }
            $xfer += $output->writeFieldBegin('parameters', TType::MAP, 5);
            $output->writeMapBegin(TType::STRING, TType::STRING, count($this->parameters));
            foreach ($this->parameters as $kiter257 => $viter258) {
                $xfer += $output->writeString($kiter257);
                $xfer += $output->writeString($viter258);
            }
            $output->writeMapEnd();
            $xfer += $output->writeFieldEnd();
        }
        if ($this->privileges !== null) {
            if (!is_object($this->privileges)) {
                throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
            }
            $xfer += $output->writeFieldBegin('privileges', TType::STRUCT, 6);
            $xfer += $this->privileges->write($output);
            $xfer += $output->writeFieldEnd();
        }
        $xfer += $output->writeFieldStop();
        $xfer += $output->writeStructEnd();
        return $xfer;
    }
}