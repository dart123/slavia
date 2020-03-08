<?php
/**
 * GetExtendedCampaignStats
 *
 * PHP version 5
 *
 * @category Class
 * @package  SendinBlue\Client
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */

/**
 * SendinBlue API
 *
 * SendinBlue provide a RESTFul API that can be used with any languages. With this API, you will be able to :   - Manage your campaigns and get the statistics   - Manage your contacts   - Send transactional Emails and SMS   - and much more...  You can download our wrappers at https://github.com/orgs/sendinblue  **Possible responses**   | Code | Message |   | :-------------: | ------------- |   | 200  | OK. Successful Request  |   | 201  | OK. Successful Creation |   | 202  | OK. Request accepted |   | 204  | OK. Successful Update/Deletion  |   | 400  | Error. Bad Request  |   | 401  | Error. Authentication Needed  |   | 402  | Error. Not enough credit, plan upgrade needed  |   | 403  | Error. Permission denied  |   | 404  | Error. Object does not exist |   | 405  | Error. Method not allowed  |
 *
 * OpenAPI spec version: 3.0.0
 * Contact: contact@sendinblue.com
 * Generated by: https://github.com/swagger-api/swagger-codegen.git
 * Swagger Codegen version: 2.3.1
 */

/**
 * NOTE: This class is auto generated by the swagger code generator program.
 * https://github.com/swagger-api/swagger-codegen
 * Do not edit the class manually.
 */

namespace SendinBlue\Client\Model;

use \ArrayAccess;
use \SendinBlue\Client\ObjectSerializer;

/**
 * GetExtendedCampaignStats Class Doc Comment
 *
 * @category Class
 * @package  SendinBlue\Client
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class GetExtendedCampaignStats implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'getExtendedCampaignStats';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'globalStats' => 'object',
        'campaignStats' => 'object[]',
        'mirrorClick' => 'int',
        'remaining' => 'int',
        'linksStats' => 'object',
        'statsByDomain' => '\SendinBlue\Client\Model\GetStatsByDomain'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'globalStats' => null,
        'campaignStats' => null,
        'mirrorClick' => 'int64',
        'remaining' => 'int64',
        'linksStats' => null,
        'statsByDomain' => null
    ];

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function swaggerTypes()
    {
        return self::$swaggerTypes;
    }

    /**
     * Array of property to format mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function swaggerFormats()
    {
        return self::$swaggerFormats;
    }

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @var string[]
     */
    protected static $attributeMap = [
        'globalStats' => 'globalStats',
        'campaignStats' => 'campaignStats',
        'mirrorClick' => 'mirrorClick',
        'remaining' => 'remaining',
        'linksStats' => 'linksStats',
        'statsByDomain' => 'statsByDomain'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'globalStats' => 'setGlobalStats',
        'campaignStats' => 'setCampaignStats',
        'mirrorClick' => 'setMirrorClick',
        'remaining' => 'setRemaining',
        'linksStats' => 'setLinksStats',
        'statsByDomain' => 'setStatsByDomain'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'globalStats' => 'getGlobalStats',
        'campaignStats' => 'getCampaignStats',
        'mirrorClick' => 'getMirrorClick',
        'remaining' => 'getRemaining',
        'linksStats' => 'getLinksStats',
        'statsByDomain' => 'getStatsByDomain'
    ];

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @return array
     */
    public static function attributeMap()
    {
        return self::$attributeMap;
    }

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @return array
     */
    public static function setters()
    {
        return self::$setters;
    }

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @return array
     */
    public static function getters()
    {
        return self::$getters;
    }

    /**
     * The original name of the model.
     *
     * @return string
     */
    public function getModelName()
    {
        return self::$swaggerModelName;
    }

    

    

    /**
     * Associative array for storing property values
     *
     * @var mixed[]
     */
    protected $container = [];

    /**
     * Constructor
     *
     * @param mixed[] $data Associated array of property values
     *                      initializing the model
     */
    public function __construct(array $data = null)
    {
        $this->container['globalStats'] = isset($data['globalStats']) ? $data['globalStats'] : null;
        $this->container['campaignStats'] = isset($data['campaignStats']) ? $data['campaignStats'] : null;
        $this->container['mirrorClick'] = isset($data['mirrorClick']) ? $data['mirrorClick'] : null;
        $this->container['remaining'] = isset($data['remaining']) ? $data['remaining'] : null;
        $this->container['linksStats'] = isset($data['linksStats']) ? $data['linksStats'] : null;
        $this->container['statsByDomain'] = isset($data['statsByDomain']) ? $data['statsByDomain'] : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        if ($this->container['globalStats'] === null) {
            $invalidProperties[] = "'globalStats' can't be null";
        }
        if ($this->container['campaignStats'] === null) {
            $invalidProperties[] = "'campaignStats' can't be null";
        }
        if ($this->container['mirrorClick'] === null) {
            $invalidProperties[] = "'mirrorClick' can't be null";
        }
        if ($this->container['remaining'] === null) {
            $invalidProperties[] = "'remaining' can't be null";
        }
        if ($this->container['linksStats'] === null) {
            $invalidProperties[] = "'linksStats' can't be null";
        }
        if ($this->container['statsByDomain'] === null) {
            $invalidProperties[] = "'statsByDomain' can't be null";
        }
        return $invalidProperties;
    }

    /**
     * Validate all the properties in the model
     * return true if all passed
     *
     * @return bool True if all properties are valid
     */
    public function valid()
    {

        if ($this->container['globalStats'] === null) {
            return false;
        }
        if ($this->container['campaignStats'] === null) {
            return false;
        }
        if ($this->container['mirrorClick'] === null) {
            return false;
        }
        if ($this->container['remaining'] === null) {
            return false;
        }
        if ($this->container['linksStats'] === null) {
            return false;
        }
        if ($this->container['statsByDomain'] === null) {
            return false;
        }
        return true;
    }


    /**
     * Gets globalStats
     *
     * @return object
     */
    public function getGlobalStats()
    {
        return $this->container['globalStats'];
    }

    /**
     * Sets globalStats
     *
     * @param object $globalStats Overall statistics of the campaign
     *
     * @return $this
     */
    public function setGlobalStats($globalStats)
    {
        $this->container['globalStats'] = $globalStats;

        return $this;
    }

    /**
     * Gets campaignStats
     *
     * @return object[]
     */
    public function getCampaignStats()
    {
        return $this->container['campaignStats'];
    }

    /**
     * Sets campaignStats
     *
     * @param object[] $campaignStats List-wise statistics of the campaign.
     *
     * @return $this
     */
    public function setCampaignStats($campaignStats)
    {
        $this->container['campaignStats'] = $campaignStats;

        return $this;
    }

    /**
     * Gets mirrorClick
     *
     * @return int
     */
    public function getMirrorClick()
    {
        return $this->container['mirrorClick'];
    }

    /**
     * Sets mirrorClick
     *
     * @param int $mirrorClick Number of clicks on mirror link
     *
     * @return $this
     */
    public function setMirrorClick($mirrorClick)
    {
        $this->container['mirrorClick'] = $mirrorClick;

        return $this;
    }

    /**
     * Gets remaining
     *
     * @return int
     */
    public function getRemaining()
    {
        return $this->container['remaining'];
    }

    /**
     * Sets remaining
     *
     * @param int $remaining Number of remaning emails to send
     *
     * @return $this
     */
    public function setRemaining($remaining)
    {
        $this->container['remaining'] = $remaining;

        return $this;
    }

    /**
     * Gets linksStats
     *
     * @return object
     */
    public function getLinksStats()
    {
        return $this->container['linksStats'];
    }

    /**
     * Sets linksStats
     *
     * @param object $linksStats Statistics about the number of clicks for the links
     *
     * @return $this
     */
    public function setLinksStats($linksStats)
    {
        $this->container['linksStats'] = $linksStats;

        return $this;
    }

    /**
     * Gets statsByDomain
     *
     * @return \SendinBlue\Client\Model\GetStatsByDomain
     */
    public function getStatsByDomain()
    {
        return $this->container['statsByDomain'];
    }

    /**
     * Sets statsByDomain
     *
     * @param \SendinBlue\Client\Model\GetStatsByDomain $statsByDomain statsByDomain
     *
     * @return $this
     */
    public function setStatsByDomain($statsByDomain)
    {
        $this->container['statsByDomain'] = $statsByDomain;

        return $this;
    }
    /**
     * Returns true if offset exists. False otherwise.
     *
     * @param integer $offset Offset
     *
     * @return boolean
     */
    public function offsetExists($offset)
    {
        return isset($this->container[$offset]);
    }

    /**
     * Gets offset.
     *
     * @param integer $offset Offset
     *
     * @return mixed
     */
    public function offsetGet($offset)
    {
        return isset($this->container[$offset]) ? $this->container[$offset] : null;
    }

    /**
     * Sets value based on offset.
     *
     * @param integer $offset Offset
     * @param mixed   $value  Value to be set
     *
     * @return void
     */
    public function offsetSet($offset, $value)
    {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }

    /**
     * Unsets offset.
     *
     * @param integer $offset Offset
     *
     * @return void
     */
    public function offsetUnset($offset)
    {
        unset($this->container[$offset]);
    }

    /**
     * Gets the string presentation of the object
     *
     * @return string
     */
    public function __toString()
    {
        if (defined('JSON_PRETTY_PRINT')) { // use JSON pretty print
            return json_encode(
                ObjectSerializer::sanitizeForSerialization($this),
                JSON_PRETTY_PRINT
            );
        }

        return json_encode(ObjectSerializer::sanitizeForSerialization($this));
    }
}


