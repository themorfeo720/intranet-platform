<?php
class ComNewsViewHtml extends ComDefaultViewHtml
{
    public function display()
    {
        $user = JFactory::getUser();
        $this->assign('user', $user->gid >= 17);
        $this->assign('agent', $user->gid > 18);
        
        return parent::display();
    }
}