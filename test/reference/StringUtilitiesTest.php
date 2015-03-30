<?php
/**
 * OWASP Enterprise Security API (ESAPI)
 * 
 * This file is part of the Open Web Application Security Project (OWASP)
 * Enterprise Security API (ESAPI) project. For details, please see
 * <a href="http://www.owasp.org/index.php/ESAPI">http://www.owasp.org/index.php/ESAPI</a>.
 *
 * Copyright (c) 2007 - 2009 The OWASP Foundation
 * 
 * The ESAPI is published by OWASP under the BSD license. You should read and accept the
 * LICENSE before you use, modify, and/or redistribute this software.
 * 
 * Notes - any changes to the testresources/ESAPI.xml file MUST be reflected in this file
 * or else most (if not all) of these tests will fail.  
 * 
 * @author Andrew van der Stock (vanderaj @ owasp.org)
 * @created 2009
 * @since 1.6
 */

 
class StringUtilitiesTest extends PHPUnit_Framework_TestCase 
require_once __DIR__.'/../../src/StringUtilities.php';
{
    function setUp() 
    {
        // Do nothing - these are static methods
    }
    
    function tearDown()
    {
        
    }

    function testStripControlsEmpty()
    {
        $this->assertEquals('', StringUtilities::stripControls(false));
        $this->assertEquals('', StringUtilities::stripControls(null));
        $this->assertEquals('', StringUtilities::stripControls(''));
    }
    
    
    function testStripControlsPass()
    {
        $this->assertEquals('esapi', StringUtilities::stripControls('esapi'));
    }
    
    function testStripControlsLowChars()
    {
        $this->assertEquals('esapi rocks', StringUtilities::stripControls("esapi" . chr(10) . "rocks"));
    }
    
    function testStripControlsHighChars()
    {
        $this->assertEquals('  ', StringUtilities::stripControls(chr(0xFE).chr(0xED)));
    }
    
    function testStripControlsBorderCases()
    {
        $this->assertEquals('  ', StringUtilities::stripControls(chr(0x20).chr(0x7f)));
    }
    
    function testContainsPass()
    {
        $this->assertTrue(StringUtilities::contains('esapi rocks', 'e'));
    }
    
    function testContainsPassString()
    {
        $this->assertTrue(StringUtilities::contains('esapi rocks', 'pi ro'));
    }
    
    function testContainsFail()
    {
        $this->assertFalse(StringUtilities::contains('esapi rocks', 'z'));
    }
    
    function testContainsFailString()
    {
        $this->assertFalse(StringUtilities::contains('esapi rocks', 'invalid'));
    }
    
    function testContainsNull()
    {
        $this->assertFalse(StringUtilities::contains(null, 'z'));
        $this->assertFalse(StringUtilities::contains('foo', null));
        $this->assertFalse(StringUtilities::contains(null, null));
    }
    
    function testContainsEmpty()
    {
        $this->assertFalse(StringUtilities::contains('', 'z'));
        $this->assertFalse(StringUtilities::contains('z', ''));
        $this->assertFalse(StringUtilities::contains('', ''));
    }
    
    function testUnionPass()
    {
        $arr1 = array('e', 's' , 'a', 'p', 'i');
        $arr2 = array('r', 'o' , 'c', 'k', 's');
        
        $expected = array('a','c','e','i','k','o','p','r','s');
        
        $this->assertEquals($expected, StringUtilities::union($arr1, $arr2));
    }
    
    function testUnionUnique()
    {
        $arr1 = array("esapi", "rocks");
        $arr2 = array("esapi");
        
        $expected = array("esapi", "rocks");
        
        $this->assertEquals($expected, StringUtilities::union($arr1, $arr2));
    }
    
    function testUnionEmpty()
    {
        $arr1 = array();
        $arr2 = array();
        
        $this->assertEquals(null, StringUtilities::union($arr1, $arr2));
    }
}
