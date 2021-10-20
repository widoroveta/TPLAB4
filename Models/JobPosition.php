<?php
namespace Models;
class JobPosition{
    private $jobPositionId;
    private $career;
    private $description;/**
 * @return mixed
 */
public function getJobPositionId()
{
    return $this->jobPositionId;
}/**
 * @param mixed $jobPositionId
 */
public function setJobPositionId($jobPositionId)
{
    $this->jobPositionId = $jobPositionId;
}/**
 * @return mixed
 */
public function getCareer()
{
    return $this->career;
}/**
 * @param mixed $career
 */
public function setCareer($career)
{
    $this->career = $career;
}/**
 * @return mixed
 */
public function getDescription()
{
    return $this->description;
}/**
 * @param mixed $description
 */
public function setDescription($description)
{
    $this->description = $description;
}

}
?>