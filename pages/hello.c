#include <webdev.h>

int main() {
    POSTDATA *postdata = webdev_get_post_data();

    const char *name = postdata->get_param( "name" );
    const char *age = postdata->get_param( "age" );

    printf( "%s", webdev_format_html( "Hello, " + name + ", your age is " + age ) );

    return 0;
}