<?php


class CommentIQ_Shortcode_atozsitesCommentShortcode implements CommentIQ_Shortcode_ShortcodeInterface
{
    /**
     * The atozsites comment generator.
     *
     * @var CommentIQ_Generator_atozsitesCommentGenerator
     */
    private $atozsites_comment_generator;

    /**
     * The post types that can use the atozsites comment shortcode.
     *
     * @var array
     */
    private $post_types;

    /**
     * Constructor.
     *
     * @param CommentIQ_Generator_atozsitesCommentGenerator $atozsites_comment_generator
     * @param array                                        $post_types
     */
    public function __construct(CommentIQ_Generator_atozsitesCommentGenerator $atozsites_comment_generator, array $post_types = array())
    {
        $this->atozsites_comment_generator = $atozsites_comment_generator;
        $this->post_types = $post_types;
    }

    /**
     * {@inheritdoc}
     */
    public static function get_name()
    {
        return 'atozsites-comment';
    }

    /**
     * {@inheritdoc}
     */
    public function generate_output($attributes, $content = '')
    {
        if (!is_main_query()) {
            return '';
        }

        $post = get_post();

        if (!$post instanceof WP_Post || !in_array($post->post_type, $this->post_types)) {
            return '';
        }

        return $this->atozsites_comment_generator->generate($post);
    }
}
