<p>
AlienBOB has kindly provided a Studioware Live ISO that can be burnt to DVD or
copied to a USB stick using dd or his iso2usb.sh script. More details here:
<a href="http://www.slackware.com/~alien/liveslak/">http://www.slackware.com/~alien/liveslak</a><br />
<br />
<a href="/live/slackware64-live-studioware-14.2.iso">slackware64-live-studioware-14.2.iso</a><br />
<a href="/live/slackware64-live-studioware-14.2.iso.asc">slackware64-live-studioware-14.2.iso.asc</a><br />
<a href="/live/slackware64-live-studioware-14.2.iso.md5">slackware64-live-studioware-14.2.iso.md5</a><br />
</p>

<p>
There is a package update that you may want to install after
booting.<br />
<br />
To update, use sepkg:<br />
sepkg -u<br />
sepkg -i fluxbox-menus<br />
<br />
This provides /usr/share/fluxbox/menu which contains our Studioware menus.
If you have not yet run fluxbox, it will be copied to ~/.fluxbox/menu on its first run.
If have already booted into fluxbox, you can copy the file manually to get our menus.
</p>
