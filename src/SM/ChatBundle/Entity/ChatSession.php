<?php
namespace SM\ChatBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Chat Session
 *
 * @ORM\Table(name="chat_session")
 * @ORM\Entity
 */
class ChatSession
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $id;

    /**
     * @ORM\ManyToOne(targetEntity="Viewer", fetch="EAGER")
     * @ORM\JoinColumn(name="viewer_id", referencedColumnName="id")
     **/
    protected $viewerId;

    /**
     * @ORM\ManyToOne(targetEntity="Model", fetch="EAGER")
     * @ORM\JoinColumn(name="model_id", referencedColumnName="id")
     **/
    protected $modelId;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set viewerId
     *
     * @param integer $viewerId
     * @return ChatSession
     */
    public function setViewerId($viewerId)
    {
        $this->viewerId = $viewerId;

        return $this;
    }

    /**
     * Get viewerId
     *
     * @return integer 
     */
    public function getViewerId()
    {
        return $this->viewerId;
    }

    /**
     * Set modelId
     *
     * @param integer $modelId
     * @return ChatSession
     */
    public function setModelId($modelId)
    {
        $this->modelId = $modelId;

        return $this;
    }

    /**
     * Get modelId
     *
     * @return integer 
     */
    public function getModelId()
    {
        return $this->modelId;
    }
}
