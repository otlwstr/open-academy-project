<?php
class WPUser{
    
    function __construct(){
        add_action('show_user_profile', [$this,'render_user_profile']);
        add_action('edit_user_profile', [$this,'render_user_profile']);
        
        add_action('profile_update', [$this,'update_user_profile']);
    }
 
    function render_user_profile($user){
        $terms = get_terms(['taxonomy'=>'course', 'hide_empty'=>false]);
        
        $userCourses = $this->getUserMeta($user->ID,'user_courses');
        
        if(!$userCourses) $userCourses=[];
        
        echo '<ul>';
        foreach($terms as $term){ ?>
            <li>
                <input type="checkbox" name="courses[]" <?php if(in_array($term->term_id,$userCourses)) echo 'checked="checked"';?> value='<?php echo $term->term_id; ?>'/>
                    <?php echo $term->name; ?>
            </li>
        <?php }
        echo '</ul>';
    }
    
    function update_user_profile($user_id){
        if(current_user_can('edit_user', $user_id)){
            $this->updateUserMeta($user_id, 'user_courses', $_POST['courses']);
        }
    }
    
    function updateUserMeta($id, $meta_key, $value){
        return update_user_meta($id, '1234_'.$meta_key, $value);
    }    
    
    function getUserMeta($id, $meta_key){
        return get_user_meta($id, '1234_'.$meta_key, true);
    }
}