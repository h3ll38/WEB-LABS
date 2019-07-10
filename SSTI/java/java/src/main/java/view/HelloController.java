package view;

import java.io.IOException;
import java.io.StringReader;
import java.io.StringWriter;
import java.io.Writer;
import java.util.HashMap;

import org.springframework.boot.autoconfigure.EnableAutoConfiguration;
import org.springframework.stereotype.Controller;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestParam;
import org.springframework.web.bind.annotation.ResponseBody;

import freemarker.template.Configuration;
import freemarker.template.Template;
import freemarker.template.TemplateException;

@Controller
@EnableAutoConfiguration
public class HelloController {
	@RequestMapping("/")	
	@ResponseBody
	public String home(@RequestParam(required = false, name = "name") String name) {
		if (name == null) {
			name = "";
		}
		String template ="<!DOCTYPE html>\r\n" + 
    			"<html lang=\"en\">\r\n" + 
    			"<head>\r\n" + 
    			"    <meta charset=\"UTF-8\">\r\n" + 
    			"    <title>SSTI</title>\r\n" + 
    			"</head>\r\n" + 
    			"<body>\r\n" + 
    			"	<form action=\"\" method=\"POST\">\r\n" + 
    			"		Do I know you? Please send me your nickname:\r\n" + 
    			"		<input type=\"text\" name=\"name\">\r\n" + 
    			"		<input type=\"submit\" value=\"check\">\r\n" + 
    			"	</form>\r\n" + 
    			"    <h2 class=\"hello-title\">It's seems that I know you :) " + name + "</h2>\r\n" + 
    			"    <!--<h2>${query}</h2>-->\r\n" + 
    			"</body>\r\n" + 
    			"</html>";
		try {
			Template t = new Template("home", new StringReader(template), new Configuration());
			Writer out = new StringWriter();
			try {
				t.process(new HashMap<Object, Object>(), out);
			} catch (TemplateException e) {
				// TODO: handle exception
				e.printStackTrace();
			}
			template = out.toString();
		} catch (IOException e) {
			e.printStackTrace();
		}
		return template;
	}
}