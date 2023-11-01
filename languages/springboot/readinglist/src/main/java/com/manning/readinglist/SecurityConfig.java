package com.manning.readinglist;

import org.springframework.context.annotation.Configuration;

@Configuration
public class SecurityConfig {

// public class SecurityConfig extends WebSecurityConfigurerAdapter {
//
// 	@Autowired
// 	private ReaderRepository readerRepository;
//
// 	@Override
// 	protected void configure(HttpSecurity http) throws Exception {
// 		http.authorizeRequests()
// 				.antMatchers("/")
// 				.access("hasRole('READER')")
// 				.antMatchers("/**")
// 				.permitAll()
// 				.and()
// 				.formLogin()
// 				.loginPage("/login")
// 				.failureUrl("/login?error=true");
// 	}
//
// 	@Override
// 	protected void configure(AuthenticationManagerBuilder auth) throws Exception {
// 		auth.userDetailsService(new UserDetailsService() {
// 			@Override
// 			public UserDetails loadUserByUsername(String username) throws UsernameNotFoundException {
// 				UserDetails userDetails = readerRepository.findOne(username);
// 				if (userDetails != null) {
// 					return userDetails;
// 				}
// 				throw new UsernameNotFoundException("User '" + username + "' not found.");
// 			}
// 		});
// 	}
}
