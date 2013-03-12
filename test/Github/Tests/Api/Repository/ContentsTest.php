<?php

namespace Github\Tests\Api\Repository;

use Github\Tests\Api\TestCase;

class ContentsTest extends TestCase
{
    /**
     * @test
     */
    public function shouldShowContentForGivenPath()
    {
        $expectedValue = '<?php //..';

        $api = $this->getApiMock();
        $api->expects($this->once())
            ->method('get')
            ->with('repos/KnpLabs/php-github-api/contents/test%2FGithub%2FTests%2FApi%2FRepository%2FContentsTest.php', array('ref' => null))
            ->will($this->returnValue($expectedValue));

        $this->assertEquals($expectedValue, $api->show('KnpLabs', 'php-github-api', 'test/Github/Tests/Api/Repository/ContentsTest.php'));
    }

    /**
     * @test
     */
    public function shouldShowReadme()
    {
        $expectedValue = 'README...';

        $api = $this->getApiMock();
        $api->expects($this->once())
            ->method('get')
            ->with('repos/KnpLabs/php-github-api/readme', array('ref' => null))
            ->will($this->returnValue($expectedValue));

        $this->assertEquals($expectedValue, $api->readme('KnpLabs', 'php-github-api'));
    }

    /**
     * @test
     */
    public function shouldFetchTarballArchiveWhenFormatNotRecognized()
    {
        $expectedValue = 'tar';

        $api = $this->getApiMock();
        $api->expects($this->once())
            ->method('get')
            ->with('repos/KnpLabs/php-github-api/tarball', array('ref' => null))
            ->will($this->returnValue($expectedValue));

        $this->assertEquals($expectedValue, $api->archive('KnpLabs', 'php-github-api', 'someFormat'));
    }

    /**
     * @test
     */
    public function shouldFetchTarballArchive()
    {
        $expectedValue = 'tar';

        $api = $this->getApiMock();
        $api->expects($this->once())
            ->method('get')
            ->with('repos/KnpLabs/php-github-api/tarball', array('ref' => null))
            ->will($this->returnValue($expectedValue));

        $this->assertEquals($expectedValue, $api->archive('KnpLabs', 'php-github-api', 'tarball'));
    }

    /**
     * @test
     */
    public function shouldFetchZipballArchive()
    {
        $expectedValue = 'zip';

        $api = $this->getApiMock();
        $api->expects($this->once())
            ->method('get')
            ->with('repos/KnpLabs/php-github-api/zipball', array('ref' => null))
            ->will($this->returnValue($expectedValue));

        $this->assertEquals($expectedValue, $api->archive('KnpLabs', 'php-github-api', 'zipball'));
    }
    
    /**
     * @test
     */
    public function shouldDownloadForGivenPath()
    {
        // The show() method return
        $getValue = json_decode(
            '{"sha":"5639a4e6ede372d7ea25b1064be4e2045c2a053d","size":2648,"name":"ContentsTest.php","path":"test\/Github\/Tests\/Api\/Repository\/ContentsTest.php","type":"file","url":"https:\/\/api.github.com\/repos\/KnpLabs\/php-github-api\/contents\/test\/Github\/Tests\/Api\/Repository\/ContentsTest.php","git_url":"https:\/\/api.github.com\/repos\/KnpLabs\/php-github-api\/git\/blobs\/5639a4e6ede372d7ea25b1064be4e2045c2a053d","html_url":"https:\/\/github.com\/KnpLabs\/php-github-api\/blob\/master\/test\/Github\/Tests\/Api\/Repository\/ContentsTest.php","_links":{"self":"https:\/\/api.github.com\/repos\/KnpLabs\/php-github-api\/contents\/test\/Github\/Tests\/Api\/Repository\/ContentsTest.php","git":"https:\/\/api.github.com\/repos\/KnpLabs\/php-github-api\/git\/blobs\/5639a4e6ede372d7ea25b1064be4e2045c2a053d","html":"https:\/\/github.com\/KnpLabs\/php-github-api\/blob\/master\/test\/Github\/Tests\/Api\/Repository\/ContentsTest.php"},"content":"PD9waHAKCm5hbWVzcGFjZSBHaXRodWJcVGVzdHNcQXBpXFJlcG9zaXRvcnk7\nCgp1c2UgR2l0aHViXFRlc3RzXEFwaVxUZXN0Q2FzZTsKCmNsYXNzIENvbnRl\nbnRzVGVzdCBleHRlbmRzIFRlc3RDYXNlCnsKICAgIC8qKgogICAgICogQHRl\nc3QKICAgICAqLwogICAgcHVibGljIGZ1bmN0aW9uIHNob3VsZFNob3dDb250\nZW50Rm9yR2l2ZW5QYXRoKCkKICAgIHsKICAgICAgICAkZXhwZWN0ZWRWYWx1\nZSA9ICc8P3BocCAvLy4uJzsKCiAgICAgICAgJGFwaSA9ICR0aGlzLT5nZXRB\ncGlNb2NrKCk7CiAgICAgICAgJGFwaS0+ZXhwZWN0cygkdGhpcy0+b25jZSgp\nKQogICAgICAgICAgICAtPm1ldGhvZCgnZ2V0JykKICAgICAgICAgICAgLT53\naXRoKCdyZXBvcy9LbnBMYWJzL3BocC1naXRodWItYXBpL2NvbnRlbnRzL3Rl\nc3QlMkZHaXRodWIlMkZUZXN0cyUyRkFwaSUyRlJlcG9zaXRvcnklMkZDb250\nZW50c1Rlc3QucGhwJywgYXJyYXkoJ3JlZicgPT4gbnVsbCkpCiAgICAgICAg\nICAgIC0+d2lsbCgkdGhpcy0+cmV0dXJuVmFsdWUoJGV4cGVjdGVkVmFsdWUp\nKTsKCiAgICAgICAgJHRoaXMtPmFzc2VydEVxdWFscygkZXhwZWN0ZWRWYWx1\nZSwgJGFwaS0+c2hvdygnS25wTGFicycsICdwaHAtZ2l0aHViLWFwaScsICd0\nZXN0L0dpdGh1Yi9UZXN0cy9BcGkvUmVwb3NpdG9yeS9Db250ZW50c1Rlc3Qu\ncGhwJykpOwogICAgfQoKICAgIC8qKgogICAgICogQHRlc3QKICAgICAqLwog\nICAgcHVibGljIGZ1bmN0aW9uIHNob3VsZFNob3dSZWFkbWUoKQogICAgewog\nICAgICAgICRleHBlY3RlZFZhbHVlID0gJ1JFQURNRS4uLic7CgogICAgICAg\nICRhcGkgPSAkdGhpcy0+Z2V0QXBpTW9jaygpOwogICAgICAgICRhcGktPmV4\ncGVjdHMoJHRoaXMtPm9uY2UoKSkKICAgICAgICAgICAgLT5tZXRob2QoJ2dl\ndCcpCiAgICAgICAgICAgIC0+d2l0aCgncmVwb3MvS25wTGFicy9waHAtZ2l0\naHViLWFwaS9yZWFkbWUnLCBhcnJheSgncmVmJyA9PiBudWxsKSkKICAgICAg\nICAgICAgLT53aWxsKCR0aGlzLT5yZXR1cm5WYWx1ZSgkZXhwZWN0ZWRWYWx1\nZSkpOwoKICAgICAgICAkdGhpcy0+YXNzZXJ0RXF1YWxzKCRleHBlY3RlZFZh\nbHVlLCAkYXBpLT5yZWFkbWUoJ0tucExhYnMnLCAncGhwLWdpdGh1Yi1hcGkn\nKSk7CiAgICB9CgogICAgLyoqCiAgICAgKiBAdGVzdAogICAgICovCiAgICBw\ndWJsaWMgZnVuY3Rpb24gc2hvdWxkRmV0Y2hUYXJiYWxsQXJjaGl2ZVdoZW5G\nb3JtYXROb3RSZWNvZ25pemVkKCkKICAgIHsKICAgICAgICAkZXhwZWN0ZWRW\nYWx1ZSA9ICd0YXInOwoKICAgICAgICAkYXBpID0gJHRoaXMtPmdldEFwaU1v\nY2soKTsKICAgICAgICAkYXBpLT5leHBlY3RzKCR0aGlzLT5vbmNlKCkpCiAg\nICAgICAgICAgIC0+bWV0aG9kKCdnZXQnKQogICAgICAgICAgICAtPndpdGgo\nJ3JlcG9zL0tucExhYnMvcGhwLWdpdGh1Yi1hcGkvdGFyYmFsbCcsIGFycmF5\nKCdyZWYnID0+IG51bGwpKQogICAgICAgICAgICAtPndpbGwoJHRoaXMtPnJl\ndHVyblZhbHVlKCRleHBlY3RlZFZhbHVlKSk7CgogICAgICAgICR0aGlzLT5h\nc3NlcnRFcXVhbHMoJGV4cGVjdGVkVmFsdWUsICRhcGktPmFyY2hpdmUoJ0tu\ncExhYnMnLCAncGhwLWdpdGh1Yi1hcGknLCAnc29tZUZvcm1hdCcpKTsKICAg\nIH0KCiAgICAvKioKICAgICAqIEB0ZXN0CiAgICAgKi8KICAgIHB1YmxpYyBm\ndW5jdGlvbiBzaG91bGRGZXRjaFRhcmJhbGxBcmNoaXZlKCkKICAgIHsKICAg\nICAgICAkZXhwZWN0ZWRWYWx1ZSA9ICd0YXInOwoKICAgICAgICAkYXBpID0g\nJHRoaXMtPmdldEFwaU1vY2soKTsKICAgICAgICAkYXBpLT5leHBlY3RzKCR0\naGlzLT5vbmNlKCkpCiAgICAgICAgICAgIC0+bWV0aG9kKCdnZXQnKQogICAg\nICAgICAgICAtPndpdGgoJ3JlcG9zL0tucExhYnMvcGhwLWdpdGh1Yi1hcGkv\ndGFyYmFsbCcsIGFycmF5KCdyZWYnID0+IG51bGwpKQogICAgICAgICAgICAt\nPndpbGwoJHRoaXMtPnJldHVyblZhbHVlKCRleHBlY3RlZFZhbHVlKSk7Cgog\nICAgICAgICR0aGlzLT5hc3NlcnRFcXVhbHMoJGV4cGVjdGVkVmFsdWUsICRh\ncGktPmFyY2hpdmUoJ0tucExhYnMnLCAncGhwLWdpdGh1Yi1hcGknLCAndGFy\nYmFsbCcpKTsKICAgIH0KCiAgICAvKioKICAgICAqIEB0ZXN0CiAgICAgKi8K\nICAgIHB1YmxpYyBmdW5jdGlvbiBzaG91bGRGZXRjaFppcGJhbGxBcmNoaXZl\nKCkKICAgIHsKICAgICAgICAkZXhwZWN0ZWRWYWx1ZSA9ICd6aXAnOwoKICAg\nICAgICAkYXBpID0gJHRoaXMtPmdldEFwaU1vY2soKTsKICAgICAgICAkYXBp\nLT5leHBlY3RzKCR0aGlzLT5vbmNlKCkpCiAgICAgICAgICAgIC0+bWV0aG9k\nKCdnZXQnKQogICAgICAgICAgICAtPndpdGgoJ3JlcG9zL0tucExhYnMvcGhw\nLWdpdGh1Yi1hcGkvemlwYmFsbCcsIGFycmF5KCdyZWYnID0+IG51bGwpKQog\nICAgICAgICAgICAtPndpbGwoJHRoaXMtPnJldHVyblZhbHVlKCRleHBlY3Rl\nZFZhbHVlKSk7CgogICAgICAgICR0aGlzLT5hc3NlcnRFcXVhbHMoJGV4cGVj\ndGVkVmFsdWUsICRhcGktPmFyY2hpdmUoJ0tucExhYnMnLCAncGhwLWdpdGh1\nYi1hcGknLCAnemlwYmFsbCcpKTsKICAgIH0KCiAgICBwcm90ZWN0ZWQgZnVu\nY3Rpb24gZ2V0QXBpQ2xhc3MoKQogICAgewogICAgICAgIHJldHVybiAnR2l0\naHViXEFwaVxSZXBvc2l0b3J5XENvbnRlbnRzJzsKICAgIH0KfQo=\n","encoding":"base64"}',
            true
        );
        
        // The download() method return
        $expectedValue = base64_decode($getValue['content']);
        
        $api = $this->getApiMock();
        $api->expects($this->once())
            ->method('get')
            ->with('repos/KnpLabs/php-github-api/contents/test%2FGithub%2FTests%2FApi%2FRepository%2FContentsTest.php', array('ref' => null))
            ->will($this->returnValue($getValue));

        $this->assertEquals($expectedValue, $api->download('KnpLabs', 'php-github-api', 'test/Github/Tests/Api/Repository/ContentsTest.php'));
    }

    protected function getApiClass()
    {
        return 'Github\Api\Repository\Contents';
    }
}
