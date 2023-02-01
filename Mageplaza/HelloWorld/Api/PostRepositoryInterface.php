<?php 
namespace Mageplaza\HelloWorld\Api;
 
 
interface PostRepositoryInterface {
    /**
     * @param int $id
     * @return \Amasty\Example\Api\Data\AmastyInterface
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getById($id);
 
    /**
     * @param \Amasty\Example\Api\Data\AmastyInterface $amasty
     * @return \Amasty\Example\Api\Data\AmastyInterface
     */
    public function save(PostInterface $post);
 
    /**
     * @param \Amasty\Example\Api\Data\AmastyInterface $amasty
     * @return void
     */
   public function delete(PostInterface $post);
 
    /**
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Amasty\Example\Api\Data\PostSearchResultInterface
     */
   public function getList(SearchCriteriaInterface $searchCriteria);
}