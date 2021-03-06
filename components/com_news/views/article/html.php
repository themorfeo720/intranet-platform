<?php
class ComNewsViewArticleHtml extends ComNewsViewHtml
{
	protected function _initialize(KConfig $config)
    {
        $config->append(array(
            'template_filters' => array('module'),
        ));

        parent::_initialize($config);
    }
    
    public function display()
    {
        $model = $this->getModel();
        $article = $model->getItem();
        
        $pathway = JFactory::getApplication()->getPathway();
        $pathway->addItem($this->escape($article->title), $this->createRoute('view=article&id='.$article->id.'&slug='.$article->slug));
        
        if ($article->id && $article->isAttachable()) {
            $this->assign('attachments', $article->getAttachments());
        }
        
        $document = JFactory::getDocument();
        
        switch ($this->getLayout())
        {
            case 'form':
                if(JFactory::getUser()->gid == 18)
                {
                    $editor_settings = array(
                        'theme_advanced_statusbar_location' => 'none',
                        'theme_advanced_buttons1'           => 'bold,italic,strikethrough,underline,|,bullist,numlist,blockquote,|,link,unlink',
    					'theme_advanced_buttons2'           => '',
                		'valid_elements'					=> 'a[href],b,blockquote,em,i,li,ol,p,span,strong,u,ul'
                    );
                } else $editor_settings = array();
                $this->assign('editor_settings', $editor_settings);
                
                $document->setTitle($article->id ? JText::_('Edit') . ' ' . $article->title : JText::_('New Article'));
                
                break;
            case 'default':
            default:
            	$user = JFactory::getUser();
            	
            	if($article->commentable)
            	{
            		$subscription = $this->getService('com://admin/news.database.table.subscriptions')
            							->select(array('news_article_id' => $article->id, 'user_id' => $user->id), KDatabase::FETCH_ROW);
            		$this->assign('subscribed', !$subscription->isNew());
            	}
            	
            	$parts = array();
            	
            	$category = $this->getService('com://site/news.model.categories')
				            	->id($article->news_category_id)
				            	->getItem();
            	if($category->id) 
            		$parts[] = $category->title;
            	
            	$parts[] = $article->title;
            		
            	$document->setTitle(implode(': ', $parts));
            	break;
        }
        
        return parent::display();
    }
}