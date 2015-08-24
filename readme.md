# ESAPI-PHP

This is the ESAPI php library. Development died out more or less in 2011 leaving a broken library but with a bunch of security classes that in my opinion are worth salvaging. From then on some people on Github worked on some basic clean up and getting the existing unit tests running.

This repository is my personal copy in order to get ESAPI ready for use in my own production environment. I am interested in narrowing down the ambition to create a good library for just input validation and output escaping. I will also try to create a new interface which doesn't need the use of a static class, but which allows instantiating an ESAPI object since it holds state, which means it's better not static.

I will push my work to github so others can benefit from it as well. I plan to make a production branch with a stripped down library in which I only include those classes that I have reviewed, cleaned up and for which I will try to complete the unit tests.

**Until further notice, none of the code in this repository has been peer-reviewed and comes without warranty.**

**As long as this readme does not contain any usage instructions, it means I haven't reached a point where I feel the library will be usable for others.**

## Current status

### August 2015

- HTMLPurifier updated to v 4.7.0
- Unit tests pass with the exception of incomplete ones (without errors or warnings)
- Basic code cleanup (trailing whitespace removed)
