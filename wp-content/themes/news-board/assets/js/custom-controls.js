(function (api) {

    api.sectionConstructor['news-board-upsell'] = api.Section.extend({

        // Remove events for this section.
        attachEvents: function () { },

        // Ensure this section is active. Normally, sections without contents aren't visible.
        isContextuallyActive: function () {
            return true;
        }
    });

    const news_board_section_lists = ['post-carousel'];

    news_board_section_lists.forEach(news_board_homepage_scroll);

    function news_board_homepage_scroll(item, index) {
        // Detect when the front page sections section is expanded (or closed) so we can adjust the preview accordingly.
        item = item.replace('-', '_');
        wp.customize.section('news_board_' + item + '_section', function (section) {
            section.expanded.bind(function (isExpanding) {
                // Value of isExpanding will = true if you're entering the section, false if you're leaving it.
                wp.customize.previewer.send(item, { expanded: isExpanding });
            });
        });
    }

})(wp.customize);