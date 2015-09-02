# SCAN Web Development Test
_______________
Hey everyone! I had a fun time with this one, first time working with SASS and to my surprise I actually really liked it. First time working with retina images, although I have used `srcset` before just not for retina images.

Anyway, here are all the files for the whole project. All public resources (HTML, CSS, JS, Images) are in the **public/** directory. Everything else is in the project's root directory. You'll notice the Composer configuration file; I used a Composer package for reading from an Excel sheet and it just made most sense to include via Composer to make use of the autoloader. To make it easy for you guys, I went ahead and put the site on my home server with required authentication, so you can log in and view it and not have to install Composer and deal with all that. You can get to it at samrapdev.com/SCAN-test and enter the key "*gigasavvy*" to get in.

# Notes
____________
I wanted to end this with a few notes about the page

- I used pixels instead of em units. I wasn't sure which you prefer, so I went with the unit that has the most browser support. Just wanted to make sure you knew I am familiar with the alternatives.
- In the design comp, some of the headings are clearly broken onto separate lines at specific points. To achieve this effect in HTML, I use `<br />` tags in the `<h1>` and hide the `<br />` once the line break starts looking weird on smaller screen sizes. This was the only practical solution I could think of to keep the look of the headings how you intended in the design comp.
- `<meta name="format-detection" content="telephone=no">`: iOS adds weird styling to patterns it detects as phone numbers, this meta tag prevents that. Instead, `tel` links are explicitly set with the `href="tel:..."` syntax.
- The image of the doctor to the left of the "*Find Your Prescriptions*" section was not included in the zip archive I received. I went ahead and cropped it out of the comp and saved it so I could use it, but there is no retina for it.
- I emailed Kris late Monday night about some confusion about the spreadsheet. I think I figured it out but you can refer to the email to make sure.

Look forward to hearing from you guys soon!
